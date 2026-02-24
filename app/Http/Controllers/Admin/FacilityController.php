<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Facility\FacilityRequest;
use App\Models\Facility;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

/**
 * Class FacilityController
 */
class FacilityController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Facility $facilityModel
    ) {}

    public function index(): View
    {
        $facilities = $this->facilityModel->query()
            ->select(['id', 'name', 'title', 'icon', 'image', 'status', 'order', 'created_at'])
            ->latest()
            ->get();

        return view('admin.pages.facilities.index', ['facilities' => $facilities]);
    }

    public function create(): View
    {
        return view('admin.pages.facilities.create');
    }

    /**
     * @throws Throwable
     */
    public function store(FacilityRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->facilityModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($data, 'icon')));
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.facilities.index')->with('success', Message::FACILITY_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Facility $facility): View
    {
        return view('admin.pages.facilities.edit', ['facility' => $facility]);
    }

    /**
     * @throws Throwable
     */
    public function update(FacilityRequest $request, Facility $facility): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $facility->only(['icon', 'image']);
            $facility->update($data);

            if ($request->hasFile('icon')) {
                @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($backup, 'icon')));
            }

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($data, 'icon')));
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.facilities.index')->with('success', Message::FACILITY_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Facility $facility): JsonResponse
    {
        try {
            $backup = $facility->only(['icon', 'image']);
            $facility->delete();
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($backup, 'icon')));
            @unlink(sprintf('%s%s', UploadFilePath::FACILITIES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::FACILITY_MESSAGE['DELETE_SUCCESS']);
    }
}
