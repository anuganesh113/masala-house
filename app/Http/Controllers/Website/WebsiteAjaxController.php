<?php

namespace App\Http\Controllers\Website;

use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Requests\Inquiry\InquiryRequest;
use App\Models\Contact;
use App\Models\Inquiry;
use Exception;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class WebsiteAjaxController
 */
class WebsiteAjaxController extends BaseController
{
    public function __construct(
        protected Contact $contactModel,
        protected Inquiry $inquiryModel,
        protected DatabaseManager $databaseManager
    ) {}

    /**
     * @throws Throwable
     */
    public function contact(ContactRequest $request): JsonResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $this->contactModel->query()->create($request->prepareData());
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return $this->responseJSON(true, Message::CONTACT_MESSAGE['SUBMIT_FAILED'], Response::HTTP_BAD_REQUEST);
        }
        $this->databaseManager->commit();

        return $this->responseJSON(true, Message::CONTACT_MESSAGE['SUBMIT_SUCCESS'], Response::HTTP_OK);
    }

    public function inquiry(InquiryRequest $request): JsonResponse
    {
        try {
            $this->inquiryModel->query()->create($request->prepareData());
        } catch (Exception $error) {
            return $this->responseJSON(true, Message::INQUIRY_MESSAGE['SUBMIT_FAILED'], Response::HTTP_BAD_REQUEST);
        }

        return $this->responseJSON(true, Message::INQUIRY_MESSAGE['SUBMIT_SUCCESS'], Response::HTTP_OK);
    }
}
