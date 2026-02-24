<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Banner\BannerRequest;
use App\Models\Banner;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class BannerController
 */
class BannerController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Banner $bannerModel,
    ) {}

    /**
     * @return View
     */
    public function index(): View
    {
        $banners = $this->bannerModel->query()
            ->select(['id','name','title','image','order','status','created_at'])
            ->orderBy('order')
            ->get();

        return view('admin.pages.banners.index', ['banners' => $banners]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.banners.create');
    }

    /**
     * @throws Throwable
     */
    public function store(BannerRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();

        try {
            $data = $request->prepareData();
            $this->bannerModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BANNERS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.banners.index')->with('success', Message::BANNER_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Banner $banner): View
    {
        return view('admin.pages.banners.edit', ['banner' => $banner]);
    }

    /**
     * @param BannerRequest $request
     * @param Banner $banner
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function update(BannerRequest $request, Banner $banner): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $banner->only(['image']);
            $banner->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::BANNERS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BANNERS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.banners.index')->with('success', Message::BANNER_MESSAGE['UPDATE_SUCCESS']);
    }

    /**
     * @param Banner $banner
     *
     * @return JsonResponse
     */
    public function destroy(Banner $banner): JsonResponse
    {
        try {
            $backup = $banner->only(['image']);
            $banner->delete();
            @unlink(sprintf('%s%s', UploadFilePath::BANNERS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(true, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(true, Message::BANNER_MESSAGE['DELETE_SUCCESS']);
    }
}
