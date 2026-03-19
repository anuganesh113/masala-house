<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Http\Requests\FAQ\FAQRequest;
use App\Models\FAQ;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class FAQController
 */
class FAQController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected FAQ $faqModel
    ) {}

    public function index(): View
    {
        $data['faqs'] = $this->faqModel->query()->get();

        return view('admin.pages.faqs.index', $data);
    }

    public function create(): View
    {
        return view('admin.pages.faqs.create');
    }

    /**
     * @throws Throwable
     */
    public function store(FAQRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $this->faqModel->query()->create($request->prepareData());
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.faqs.index')->with('success', Message::FAQ_MESSAGE['CREATE_SUCCESS']);
    }

    /**
     * @throws Throwable
     */
    public function update(FAQ $faq, FAQRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $faq->update($request->prepareData());
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.faqs.index')->with('success', Message::FAQ_MESSAGE['UPDATE_SUCCESS']);
    }

    public function edit(FAQ $faq): View|RedirectResponse
    {
        if ($faq->event_id !== null) {
            return back()->with('error', Message::GENERAL_MESSAGE['UNAUTHORIZED_ACTION']);
        }

        return view('admin.pages.faqs.edit', [
            'faq' => $faq,
        ]);
    }

    public function destroy(FAQ $faq): JsonResponse
    {
        if ($faq->event_id !== null) {
            return $this->jsonResponse(General::FALSE, Message::GENERAL_MESSAGE['UNAUTHORIZED_ACTION'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $faq->delete();
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::FAQ_MESSAGE['DELETE_SUCCESS']);
    }
}
