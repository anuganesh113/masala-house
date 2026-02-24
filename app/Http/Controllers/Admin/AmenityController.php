<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Amenity\AmenityRequest;
use App\Models\Amenity;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class AmenityController
 */
class AmenityController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Amenity $amenityModel
    ) {}

    public function index(): View
    {
        $amenities = $this->amenityModel->query()
            ->select(['id', 'name', 'image', 'created_at'])
            ->latest()
            ->get();

        return view('admin.pages.amenities.index', [
            'amenities' => $amenities,
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.amenities.create');
    }

    /**
     * @throws Throwable
     */
    public function store(AmenityRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->amenityModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::AMENITIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.amenities.index')->with('success', Message::AMENITY_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Amenity $amenity): View
    {
        return view('admin.pages.amenities.edit', ['amenity' => $amenity]);
    }

    /**
     * @throws Throwable
     */
    public function update(AmenityRequest $request, Amenity $amenity): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $amenity->only(['image']);
            $amenity->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::AMENITIES_PATH, data_get($backup, 'image')));
            }

        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::AMENITIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.amenities.index')->with('success', Message::AMENITY_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Amenity $amenity): JsonResponse
    {
        try {
            $backup = $amenity->only(['image']);
            $amenity->delete();
            @unlink(sprintf('%s%s', UploadFilePath::AMENITIES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::AMENITY_MESSAGE['DELETE_SUCCESS']);
    }
}
