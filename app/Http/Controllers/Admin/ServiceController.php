<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Service\ServiceRequest;
use App\Models\Service;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class ServiceController
 */
class ServiceController extends BaseController
{
    /**
     * @param DatabaseManager $databaseManager
     * @param Service $serviceModel
     */
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Service $serviceModel
    ) {}

    /**
     * @return View
     */
    public function index(): View
    {
        $data['services'] = $this->serviceModel->query()->latest()->get(['id','name','image','created_at']);

        return view('admin.pages.services.index', $data);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.services.create');
    }

    /**
     * @param ServiceRequest $request
     *
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->serviceModel->query()->create($data);
        } catch(Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::SERVICES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.services.index')->with('success', Message::SERVICE_MESSAGE['CREATE_SUCCESS']);
    }

    /**
     * @param Service $service
     *
     * @return View
     */
    public function edit(Service $service): View
    {
        return view('admin.pages.services.edit', ['service' => $service]);
    }

    /**
     * @param ServiceRequest $request
     * @param Service $service
     *
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $service->only(['image']);
            $service->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::SERVICES_PATH, data_get($backup, 'image')));
            }
        } catch(Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::SERVICES_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.services.index')->with('success', Message::SERVICE_MESSAGE['UPDATE_SUCCESS']);
    }

    /**
     * @param Service $service
     *
     * @return JsonResponse
     */
    public function destroy(Service $service): JsonResponse
    {
        try {
            $backup = $service->only(['image']);
            $service->delete();
            @unlink(sprintf('%s%s', UploadFilePath::SERVICES_PATH, data_get($backup, 'image')));
        } catch(Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::SERVICE_MESSAGE['DELETE_SUCCESS']);
    }
}
