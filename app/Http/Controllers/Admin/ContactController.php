<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Models\Contact;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;
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

     public function messageSeen(Request $request,  $id)
    {
        $contact = $this->contactModel->find($id);
        $contact->update(['seen' => true]);

        return  Redirect::back()->with('success', 'Message marked as seen');
    }
}
