<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class AdminController
 */
class AdminController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Admin $adminModel
    ) {}

    public function index(): View
    {
        $data['admins'] = $this->adminModel->latest()->get();

        return view('admin.pages.admins.index', $data);
    }

    public function create(): View
    {
        return view('admin.pages.admins.create');
    }

    /**
     * @throws Throwable
     */
    public function store(AdminRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->adminModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::ADMINS_PATH, data_get($data, 'profile')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.admins.index')->with('success', Message::ADMIN_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Admin $admin): View
    {
        return view('admin.pages.admins.edit', ['admin' => $admin]);
    }

    /**
     * @throws Throwable
     */
    public function update(AdminRequest $request, Admin $admin): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $old_admin = data_get($admin, 'profile');
            $admin->update($data);

            if ($request->hasFile('profile')) {
                @unlink(sprintf('%s%s', UploadFilePath::ADMINS_PATH, $old_admin));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::ADMINS_PATH, data_get($data, 'profile')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.admins.index')->with('success', Message::ADMIN_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Request $request, Admin $admin): JsonResponse
    {
        if (data_get($admin, 'id') == currentUser()->id) {
            return $this->jsonResponse(General::FALSE, Message::ADMIN_MESSAGE['CANNOT_DELETE_OWN'], Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $admin_profile = data_get($admin, 'profile', '');
            $admin->delete();

            @unlink(sprintf('%s%s', UploadFilePath::ADMINS_PATH, $admin_profile));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::ADMIN_MESSAGE['DELETE_SUCCESS'], Response::HTTP_ACCEPTED);
    }
}
