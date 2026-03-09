<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Banner\BannerRequest;
use App\Http\Requests\Popup\PopupRequest;
use App\Models\Banner;
use App\Models\Popup;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class PopupController
 */
class PopupController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Popup $popupModel,
    ) {}

    /**
     * @return View
     */
    public function index(): View
    {
        $popups = $this->popupModel->query()
            ->Image()->select(['id', 'name', 'title', 'image', 'order', 'status', 'created_at'])
            ->orderBy('order')
            ->get();

        return view('admin.pages.popups.index', ['popups' => $popups]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.pages.popups.create');
    }

    /**
     * @throws Throwable
     */
    public function store(PopupRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();

        try {
            $data = $request->prepareData();
            $this->popupModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::POPUPS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.popups.index')->with('success', Message::POPUP_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Popup $popup): View
    {
        return view('admin.pages.popups.edit', ['popup' => $popup]);
    }

    /**
     * @param PopupRequest $request
     * @param Popup $popup
     * @return RedirectResponse
     *
     * @throws Throwable
     */
    public function update(PopupRequest $request, Popup $popup): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $popup->only(['image']);
            $popup->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::POPUPS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::POPUPS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.popups.index')->with('success', Message::POPUP_MESSAGE['UPDATE_SUCCESS']);
    }

    /**
     * @param Banner $banner
     *
     * @return JsonResponse
     */
    public function destroy(Banner $banner): JsonResponse
    {
        try {
            $backup = $banner->only(['image']);
            $banner->delete();
            @unlink(sprintf('%s%s', UploadFilePath::POPUPS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(true, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(true, Message::POPUP_MESSAGE['DELETE_SUCCESS']);
    }

    public function videoindex()
    {
        $popups = $this->popupModel->query()
            ->Video()
            ->orderBy('order')
            ->first();


        return view('admin.pages.popups.videoindex', ['popups' => $popups]);
    }


    public function videocreate(Request $request)
    {
        
        $data = $request->all();
        if (isset($request->video_id) && !empty($request->video_id)) {
            $popup = Popup::findOrFail($request->video_id);
            $popup->update($data);
            $message = 'Video updated successfully';
        } else {
            Popup::create($data);
            $message = 'Video created successfully';
        }
       

        return redirect()->back()->with('success', $message);
    }
}
