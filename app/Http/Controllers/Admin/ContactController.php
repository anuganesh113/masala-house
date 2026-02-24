<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Models\Contact;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ContactController
 */
class ContactController extends BaseController
{
    public function __construct(
        protected Contact $contactModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $data['contacts'] = $this->contactModel->latest()->get();

        return view('admin.pages.contact.index', $data);
    }

    public function delete(Contact $contact): JsonResponse
    {
        $contact->delete();

        return $this->jsonResponse(General::TRUE, Message::CONTACT_MESSAGE['DELETE_SUCCESS'], Response::HTTP_ACCEPTED);
    }
}
