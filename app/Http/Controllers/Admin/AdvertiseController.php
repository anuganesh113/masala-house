<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Advertise\AdvertiseRequest;
use App\Models\Advertise;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

/**
 * Class AdvertiseController
 */
class AdvertiseController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Advertise $advertiseModel
    ) {}

    public function index(): View
    {
        $advertises = $this->advertiseModel
            ->select(['id', 'name', 'image', 'order', 'status', 'type', 'created_at'])
            ->latest()
            ->get();

        return view('admin.pages.advertises.index', [
            'advertises' => $advertises,
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.advertises.create');
    }

    /**
     * @throws Throwable
     */
    public function store(AdvertiseRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->advertiseModel->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::ADVERTISES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.advertises.index')->with('success', Message::ADVERTISE_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Advertise $advertise): View
    {
        return view('admin.pages.advertises.edit', ['advertise' => $advertise]);
    }

    /**
     * @throws Throwable
     */
    public function update(AdvertiseRequest $request, Advertise $advertise): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $advertise->only(['image']);
            $advertise->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::ADVERTISES_PATH, data_get($backup, 'image')));
            }

        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::ADVERTISES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.advertises.index')->with('success', Message::ADVERTISE_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Advertise $advertise): JsonResponse
    {
        try {
            $backup = $advertise->only(['image']);
            $advertise->delete();
            @unlink(sprintf('%s%s', UploadFilePath::ADVERTISES_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::ADVERTISE_MESSAGE['DELETE_SUCCESS']);
    }
}
