<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\SettingRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\RedirectResponse;
use Throwable;

/**
 * class SettingController
 */
class SettingController extends Controller
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Setting $settingModel
    ) {}

    public function setting(): View
    {
        $setting = $this->settingModel->query()->first();

        return view('admin.pages.setting', ['setting' => $setting]);
    }

    /**
     * @throws Throwable
     */
    public function update(SettingRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $setting = $this->settingModel->query()->first();
            $data = $request->prepareData();
            $old_color_logo = data_get($setting, 'color_logo');
            $old_white_logo = data_get($setting, 'white_logo');

            isset($setting) ? $setting->update($data) : $this->settingModel->query()->create($data);

            if ($request->hasFile('color_logo')) {
                @unlink(sprintf('%s%s', UploadFilePath::LOGO_PATH, $old_color_logo));
            }

            if ($request->hasFile('white_logo')) {
                @unlink(sprintf('%s%s', UploadFilePath::LOGO_PATH, $old_white_logo));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::LOGO_PATH, data_get($data, 'color_logo')));
            @unlink(sprintf('%s%s', UploadFilePath::LOGO_PATH, data_get($data, 'white_logo')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.setting')->with('success', Message::SETTING_MESSAGE['UPDATE_SUCCESS']);
    }
}
