<?php

namespace App\Http\Controllers\Admin;

use App\Constants\General;
use App\Constants\Message;
use App\Enums\UploadFilePath;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * class BlogController
 */
class BlogController extends BaseController
{
    public function __construct(
        protected DatabaseManager $databaseManager,
        protected Blog $blogModel
    ) {}

    public function index(): View
    {
        $blogs = $this->blogModel->query()
            ->select(['id','tag','name','image','status','created_at'])
            ->latest()
            ->get();

        return view('admin.pages.blogs.index', ['blogs' => $blogs]);
    }

    public function create(): View
    {
        return view('admin.pages.blogs.create');
    }

    /**
     * @throws Throwable
     */
    public function store(BlogRequest $request): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $this->blogModel->query()->create($data);
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BLOGS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.blogs.index')->with('success', Message::BLOG_MESSAGE['CREATE_SUCCESS']);
    }

    public function edit(Blog $blog): View
    {
        return view('admin.pages.blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * @throws Throwable
     */
    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $this->databaseManager->beginTransaction();
        try {
            $data = $request->prepareData();
            $backup = $blog->only(['image']);
            $blog->update($data);

            if ($request->hasFile('image')) {
                @unlink(sprintf('%s%s', UploadFilePath::BLOGS_PATH, data_get($backup, 'image')));
            }
        } catch (Exception $error) {
            $this->databaseManager->rollBack();
            @unlink(sprintf('%s%s', UploadFilePath::BLOGS_PATH, data_get($data, 'image')));

            return back()->withInput($request->all())->with('error', $error->getMessage());
        }
        $this->databaseManager->commit();

        return to_route('admin.blogs.index')->with('success', Message::BLOG_MESSAGE['UPDATE_SUCCESS']);
    }

    public function destroy(Blog $blog): JsonResponse
    {
        try {
            $backup = $blog->only(['image']);
            $blog->delete();
            @unlink(sprintf('%s%s', UploadFilePath::BLOGS_PATH, data_get($backup, 'image')));
        } catch (Exception $error) {
            return $this->jsonResponse(General::FALSE, $error->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->jsonResponse(General::TRUE, Message::BLOG_MESSAGE['DELETE_SUCCESS']);
    }
}
