<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\MemberMessage\MemberMessageRequest;
use App\Models\MemberMessage;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

/**
 * Class MemberMessageController
 */
class MemberMessageController extends BaseController
{
    public function __construct(
        protected MemberMessage $memberModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $members = $this->memberModel->query()
            ->latest()
            ->orderBy('order')
            ->get(['id', 'name', 'image', 'designation', 'order', 'status', 'created_at']);

        return view('admin.pages.members.index', ['members' => $members]);
    }

    public function create(): View
    {
        return view('admin.pages.members.create');
    }

    /**
     * @throws Throwable
     */
    public function store(MemberMessageRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->memberModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::MEMBERS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.members.index')->with('success', Message::MEMBER_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(MemberMessage $member): View
    {
        return view('admin.pages.members.edit', ['member' => $member]);
    }

    /**
     * @throws Throwable
     */
    public function update(MemberMessageRequest $request, MemberMessage $member): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $member->only(['image']);
            $member->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::MEMBERS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::MEMBERS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.members.index')->with('success', Message::MEMBER_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(MemberMessage $member): JsonResponse
    {
        try {
            $backup = $member->only(['image']);
            $member->delete();
            @unlink(sprintf('%s%s', UploadFilePath::MEMBERS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::MEMBER_MESSAGE['DELETE_SUCCESS']);
    }
}
