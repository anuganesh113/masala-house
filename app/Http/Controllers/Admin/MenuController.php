<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\MenuCategory;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Menu\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class MenuController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Menu $menuModel
    ) {}

    public function index(): View
    {
        $menus = $this->menuModel->query()
            ->with(['category:id,name'])
            ->select(['id','category_id','name','image','type','status','price','created_at'])
            ->latest()
            ->get();

        return view('admin.pages.menus.index', ['menus' => $menus]);
    }

    public function create(): View
    {
        $categories = Category::query()->select(['id','name'])->get();

        return view('admin.pages.menus.create', ['categories' => $categories]);
    }

    /**
     * @throws Throwable
     */
    public function store(MenuRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->menuModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::MENUS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.menus.index')->with('success', Message::MENU_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Menu $menu): View
    {
        $data['categories'] = Category::query()->select(['id','name'])->get();

        return view('admin.pages.menus.edit', [
            ...$data, 'menu' => $menu->loadMissing(['category:id,name']),
        ]);
    }

    /**
     * @throws Throwable
     */
    public function update(MenuRequest $request, Menu $menu): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $menu->only(['image']);
            $menu->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::MENUS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::MENUS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.menus.index')->with('success', Message::MENU_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Menu $menu): JsonResponse
    {
        try {
            $backup = $menu->only(['image']);
            $menu->delete();
            @unlink(sprintf('%s%s', UploadFilePath::MENUS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::MENU_MESSAGE['DELETE_SUCCESS']);
    }
}
