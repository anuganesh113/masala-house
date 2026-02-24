<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Brand\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

/**
 * class BrandController
 */
class BrandController extends BaseController
{
    public function __construct(
        protected Brand $brandModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $brands = $this->brandModel->query()
            ->select(['id', 'name', 'image', 'status', 'order', 'created_at'])
            ->latest()
            ->get();

        return view('admin.pages.brands.index', ['brands' => $brands]);
    }

    public function create(): View
    {
        return view('admin.pages.brands.create');
    }

    /**
     * @throws Throwable
     */
    public function store(BrandRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->brandModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BRANDS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.brands.index')->with('success', Message::BRANDS_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Brand $brand): View
    {
        return view('admin.pages.brands.edit', ['brand' => $brand]);
    }

    /**
     * @throws Throwable
     */
    public function update(Brand $brand, BrandRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $image = data_get($brand, 'image');
            $brand->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::BRANDS_PATH, $image));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BRANDS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.brands.index')->with('success', Message::BRANDS_MESSAGE['UPDATE_SUCCESS']);
    }

    /**
     * @throws Throwable
     */
    public function destroy(Brand $brand): JsonResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $image = data_get($brand, 'image');
            $brand->delete();
            @unlink(sprintf('%s%s', UploadFilePath::BRANDS_PATH, $image));
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return $this->jsonResponse(General::FALSE, $error->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }
        $this->databaseManager->commit();

        return $this->jsonResponse(General::TRUE, Message::BRANDS_MESSAGE['DELETE_SUCCESS']);
    }
}
