<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Testimonial\TestimonialRequest;
use App\Models\MemberMessage;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

/**
 * class TestimonialController
 */
class TestimonialController extends BaseController
{
    public function __construct(
        protected Testimonial $testimonialModel,
        protected DatabaseManager $databaseManager
    ) {}

    public function index(): View
    {
        $testimonials = $this->testimonialModel->query()
            ->select(['id','name','designation','image','status','created_at'])
            ->latest()
            ->get();

        return view('admin.pages.testimonials.index', [
            'testimonials' => $testimonials,
        ]);
    }

    public function create(): View
    {
        $members = MemberMessage::query()->select(['id','name'])->get();

        return view('admin.pages.testimonials.create', ['members' => $members]);
    }

    /**
     * @throws Throwable
     */
    public function store(TestimonialRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->testimonialModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::TESTIMONIALS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.testimonials.index')->with('success', Message::TESTIMONIAL_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Testimonial $testimonial): View
    {
        $members = MemberMessage::query()->select(['id','name'])->get();

        return view('admin.pages.testimonials.edit', [
            'testimonial' => $testimonial->loadMissing(['member']),
            'members' => $members
        ]);
    }

    /**
     * @throws Throwable
     */
    public function update(Testimonial $testimonial, TestimonialRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $testimonial->only(['image']);
            $testimonial->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::TESTIMONIALS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::TESTIMONIALS_PATH, $data['image'] ?? ''));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.testimonials.index')->with('success', Message::TESTIMONIAL_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        try {
            $backup = $testimonial->only(['image']);
            $testimonial->delete();
            @unlink(sprintf('%s%s', UploadFilePath::TESTIMONIALS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::TESTIMONIAL_MESSAGE['DELETE_SUCCESS']);
    }
}
