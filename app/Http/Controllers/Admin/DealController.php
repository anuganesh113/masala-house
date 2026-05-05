<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Deal\DealRequest;
use App\Models\Deal;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DealController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Deal $dealModel,
    ) {}

    public function index(): View
    {
        $deals = $this->dealModel->query()
            ->orderBy('order')
            ->get();
          

        return view('admin.pages.deals.index', ['deals' => $deals]);
    }

    public function create(): View
    {
        return view('admin.pages.deals.create');
    }

    public function store(DealRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();

        try {
            $data = $request->prepareData();
            $this->dealModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::DEALS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.deals.index')->with('success', Message::DEAL_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Deal $deal): View
    {
        return view('admin.pages.deals.edit', ['deal' => $deal]);
    }

    public function update(DealRequest $request, Deal $deal): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $deal->only(['image']);
            $deal->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::DEALS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::DEALS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.deals.index')->with('success', Message::DEAL_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Deal $deal): JsonResponse
    {
        try {
            $backup = $deal->only(['image']);
            $deal->delete();
            if(data_get($backup, 'image')) {
                @unlink(sprintf('%s%s', UploadFilePath::DEALS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            return $this->jsonResponse(true, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(true, Message::DEAL_MESSAGE['DELETE_SUCCESS']);
    }
}
