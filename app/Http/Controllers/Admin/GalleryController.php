<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Gallery\GalleryRequest;
use App\Models\Album;
use App\Models\Gallery;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class GalleryController
 */
class GalleryController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Album $albumModel,
        protected Gallery $galleryModel
    ) {}

    public function index(): View
    {
        $data['album'] = $this->albumModel->with(['gallery'])->latest()->get();

        return view('admin.pages.galleries.index', $data);
    }

    public function create(): View
    {
        return view('admin.pages.galleries.create');
    }

    /**
     * @throws Throwable
     */
    public function store(GalleryRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $album = $this->albumModel->query()->create($data);

            foreach (data_get($data, 'gallery', []) as $gal) {
                $album->gallery()->create(['image' => $gal]);
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($data, 'image')));

            foreach (data_get($data, 'gallery', []) as $gal) {
                @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, $gal));
            }

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.galleries.index')->with('success', Message::GALLERY_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Album $gallery): View
    {
        return view('admin.pages.galleries.edit', ['gallery' => $gallery->load(['gallery'])]);
    }

    /**
     * @throws Throwable
     */
    public function update(Album $gallery, GalleryRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $gallery->only('image');
            $gallery->update($data);

            foreach (data_get($data, 'gallery', []) as $gal) {
                $gallery->gallery()->create(['image' => $gal]);
            }

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($data, 'image')));

            foreach (data_get($data, 'gallery', []) as $gal) {
                @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, $gal));
            }

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return back()->with('success', Message::GALLERY_MESSAGE['UPDATE_SUCCESS']);
    }

    public function delete(Album $album): JsonResponse
    {
        try {
            $backup = $album->load(['gallery']);
            $album->delete();
            @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::GALLERY_MESSAGE['DELETE_SUCCESS']);
    }

    public function destroyGallery(Album $album, Gallery $gallery): JsonResponse
    {
        if ($album->id !== $gallery->album_id) {
            return $this->jsonResponse(General::FALSE, Message::GALLERY_MESSAGE['INVALID_IMAGE'], Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $backup = $gallery->only(['image']);
            $gallery->delete();

            @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(false, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::GALLERY_MESSAGE['DELETE_SUCCESS']);
    }
}
