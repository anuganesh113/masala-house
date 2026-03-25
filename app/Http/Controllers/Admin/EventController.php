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

class EventController extends Controller
{
    
 public function __construct(
        protected DatabaseManager $databaseManager,
        protected Event $eventModel
    ) {}

    public function index(): View
    {
        $data['events'] = $this->eventModel->query()
            ->select(['id', 'name', 'created_at'])
            ->latest()
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

    public function delete(Event $event ,$id)
    {
        $event = Event::find($id);
        $backup = $event->only(['image']);
        $event->delete();
        @unlink(sprintf('%s%s', UploadFilePath::EVENT_PATH, data_get($backup, 'image')));
        return redirect()->back()->with('success', Message::EVENT_MESSAGE['DELETE_SUCCESS']);
    }
}
