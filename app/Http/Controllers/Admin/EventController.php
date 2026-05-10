<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventRequest;
use App\Models\Event;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Traits\reorder;
class EventController extends Controller
{
     use reorder;
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Event $eventModel
    ) {}

    public function index(): View
    {
        $data['events'] = $this->eventModel->query()
            ->select(['id', 'name', 'status', 'created_at', 'type' ,'order'])
            ->orderBy('order')
            ->get();

        return view('admin.pages.events.index', $data);
    }

    public function create(): View
    {
        return view('admin.pages.events.create');
    }

    /**
     * @throws Throwable
     */
    public function store(EventRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->eventModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.events.index')->with('success', Message::EVENT_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Event $event): View
    {
        return view('admin.pages.events.edit', ['event' => $event]);
    }

    /**
     * @throws Throwable
     */
    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $event->update($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.events.index')->with('success', Message::EVENT_MESSAGE['UPDATE_SUCCESS']);
    }

    public function delete(Event $event, $id)
    {
    

        $event = Event::find($id);
      
        // if ($event->type == 1 || $event->type == 2) {
            
            $a = $event->eventfaqs()->count();
            if ($a > 0) {
                return redirect()->back()->with('error', 'Cant delete this event because it has faqs');
            }else{
                $backup = $event->only(['image']);
                $event->delete();
                @unlink(sprintf('%s%s', UploadFilePath::EVENT_PATH, data_get($backup, 'image')));
                return redirect()->back()->with('success', Message::EVENT_MESSAGE['DELETE_SUCCESS']);
            }
        // } 
        
        // else {
        //     $backup = $event->only(['image']);
        //     $event->delete();
        //     @unlink(sprintf('%s%s', UploadFilePath::EVENT_PATH, data_get($backup, 'image')));
        //     return redirect()->back()->with('success', Message::EVENT_MESSAGE['DELETE_SUCCESS']);
        // }
    }

        public function rowReOrder(Request $request): JsonResponse
    {
       
        $re_order = Event::select(['id', 'order'])->get();
        $this->reOrder($re_order, 'order');
        return response()->json(['status' => 'success', 'success' =>  'Order Updated Successfully']);
        
    }
}
