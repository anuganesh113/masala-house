<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Http\Requests\FAQ\FAQRequest;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\Menu;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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
        $data['faqs'] = $this->faqModel->query()->wherenull('model_type')->get();
        return view('admin.pages.faqs.index', $data);
    }

    public function create(): View
    {
        $data['events'] = Event::where('type',1)->status()->get();
        return view('admin.pages.faqs.create',  $data);
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


        $events = Event::status()->where('type', 1)->get();
        return view('admin.pages.faqs.edit', [
            'faq' => $faq,
            'events' => $events
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


    public function faqtype(Request $request)
    {

        $data['faqs'] = Faq::where('model_type',  request()->segment(3))->where('model_id', request()->segment(4))->get();
        return view('admin.pages.faqs.faqtype', $data);
    }

    public function faqtypecreate(Request $request)
    {
        $req =  request()->segment(4);
        if ($req == 'menu') {
            $data['model'] = Menu::where('id', request()->segment(5))->first();
        } else {
            $data['model'] = Event::where('id', request()->segment(5))->first();
        }
        return view('admin.pages.faqs.faqtypecreate',  $data);
    }
    public function faqtypeedit(Request $request, $id)
    {
        $req =  request()->segment(5);
        $data['faq'] = Faq::find($id);
        if ($req == 'menu') {
            $data['model'] = Menu::where('id', $data['faq']->model_id)->first();
        } else {
            $data['model'] = Event::where('id', $data['faq']->model_id)->first();
        }


        return view('admin.pages.faqs.faqtypecreate',  $data);
    }

    public function faqtypestore(Request $request)
    {
        $request->validate([
            'question' => 'required|max:1000',
            'answer' => 'required|max:3000',

        ], [
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',

        ]);

        $data = $request->all();
        if (isset($request->faq_id) &&  $request->faq_id) {
            $faq = Faq::find($request->faq_id);
            $faq->save();
        } else {
            $faq = Faq::create($data);
        }
        return redirect()->route('admin.faqtype', ['type' =>  $faq->model_type, 'id' => $faq->model_id])->with('success', Message::FAQ_MESSAGE['CREATE_SUCCESS']);
    }
}
