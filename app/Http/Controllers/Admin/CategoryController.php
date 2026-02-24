<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class CategoryController
 */
class CategoryController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Category $categoryModel
    ) {}

    public function index(): View
    {
        $data['categories'] = $this->categoryModel->query()
            ->select(['id', 'name', 'created_at'])
            ->latest()
            ->get();

        return view('admin.pages.categories.index', $data);
    }

    public function create(): View
    {
        return view('admin.pages.categories.create');
    }

    /**
     * @throws Throwable
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->categoryModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
               @unlink(sprintf('%s%s', UploadFilePath::CATEGORIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.categories.index')->with('success', Message::CATEGORY_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Category $category): View
    {
        return view('admin.pages.categories.edit', ['category' => $category]);
    }

    /**
     * @throws Throwable
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
               $backup = $category->only(['image']);
            $category->update($data);
                   if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::CATEGORIES_PATH, data_get($backup, 'image')));
            }

        } catch (Exception $error) {
            $this->databaseManager->rollBack();
               @unlink(sprintf('%s%s', UploadFilePath::CATEGORIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.categories.index')->with('success', Message::CATEGORY_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Category $category): JsonResponse
    {
        try {
              $backup = $category->only(['image']);
            $category->delete();
              @unlink(sprintf('%s%s', UploadFilePath::CATEGORIES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::CATEGORY_MESSAGE['DELETE_SUCCESS']);
    }
}
