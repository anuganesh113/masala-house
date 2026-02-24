<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Page\PageRequest;
use App\Models\Page;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class PageController
 */
class PageController extends BaseController
{
    public function __construct(
        protected Page $pageModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $data['pages'] = $this->pageModel->query()
            ->with(['parent:id,page_id,name'])
            ->get();

        return view('admin.pages.pages.index', $data);
    }

    public function create(): View
    {
        $data['pages'] = $this->pageModel->query()
            ->whereNull('page_id')
            ->orderBy('name')
            ->get();

        return view('admin.pages.pages.create', $data);
    }

    /**
     * @throws Throwable
     */
    public function store(PageRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->pageModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($data ?? [], 'image_one')));
            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($data ?? [], 'image_two')));

            foreach (data_get($data ?? [], 'images') ?? [] as $image) {
                @unlink(sprintf('%s%s', UploadFilePath::IMAGES_PATH, $image));
            }

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.pages.index')->with('success', Message::PAGE_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Page $page): View
    {
        $pages = $this->pageModel->query()
            ->whereNull(columns: 'page_id')
            ->whereNot(column: 'id', value: $page->id)
            ->status()
            ->orderBy('name')
            ->get();

        return view('admin.pages.pages.edit', [
            'pages' => $pages,
            'page' => $page,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function update(Page $page, PageRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $page->only(['image_one', 'image_two']);
            $data['images'] = array_merge(data_get($data, 'images') ?? [], data_get($page, 'images') ?? []);
            $page->update($data);

            if ($request->hasFile('image_one')) {
                @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($backup, 'image_one')));
            }

            if ($request->hasFile('image_two')) {
                @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($backup, 'image_two')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($data, 'image_one')));
            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($data, 'image_two')));

            foreach (data_get($data ?? [], 'images') ?? [] as $image) {
                @unlink(sprintf('%s%s', UploadFilePath::IMAGES_PATH, $image));
            }

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.pages.index')->with('success', Message::PAGE_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Page $page): JsonResponse
    {
        try {
            if (count($page->child ?? [])) {
                return $this->jsonResponse(General::FALSE, Message::PAGE_MESSAGE['PAGE_HAS_CHILD'], Response::HTTP_NOT_ACCEPTABLE);
            }
            $backup = $page->only(['image_one','image_two','images']);
            $page->delete();

            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($backup, 'image_one')));
            @unlink(sprintf('%s%s', UploadFilePath::PAGES_PATH, data_get($backup, 'image_two')));

            foreach (data_get($backup, 'images') ?? [] as $image) {
                @unlink(sprintf('%s%s', UploadFilePath::IMAGES_PATH, $image));
            }
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::PAGE_MESSAGE['DELETE_SUCCESS']);
    }

    public function deleteImage(Page $page, Request $request): JsonResponse
    {
        if (! file_exists(public_path(sprintf('%s%s', UploadFilePath::IMAGES_PATH, $request->get('image'))))) {
            return $this->jsonResponse(General::FALSE, Message::GENERAL_MESSAGE['IMAGE_NOT_FOUND'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $images = $event->images ?? [];
            $updated_images = array_values(array_diff($images, [$request->get('image')]));
            $page->update(['images' => $updated_images]);
            @unlink(sprintf('%s%s', UploadFilePath::IMAGES_PATH, $request->get('image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::PAGE_MESSAGE['DELETE_SUCCESS']);
    }
}
