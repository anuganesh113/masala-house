<?php

namespace App\Http\Controllers\Api;

use App\Constants\General;
use App\Http\Controllers\BaseController;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseController
{
    #[OA\Get(
        path: '/api/pages',
        operationId: 'getPages',
        description: 'Returns active parent pages with their active child pages.',
        summary: 'List pages',
        tags: ['Pages'],
        responses: [
            new OA\Response(response: 200, description: 'Pages returned.'),
        ],
    )]
    public function index(): JsonResponse
    {
        $pages = Page::query()
            ->with(['child' => function ($query): void {
                $query
                    ->status()
                    ->select([
                        'id',
                        'page_id',
                        'name',
                        'title',
                        'slug',
                        'template',
                        'order',
                        'status',
                    ])
                    ->orderBy('order');
            }])
            ->status()
            ->whereNull('page_id')
            ->select([
                'id',
                'page_id',
                'name',
                'title',
                'slug',
                'image_one',
                'image_one_alt',
                'excerpt',
                'template',
                'order',
                'status',
            ])
            ->orderBy('order')
            ->get()
            ->map(fn (Page $page): array => $this->formatPage($page, includeChildren: true))
            ->values()
            ->all();

        return $this->jsonResponse(General::TRUE, 'Pages returned successfully.', data: $pages);
    }

    #[OA\Get(
        path: '/api/pages/{page}',
        operationId: 'getPage',
        description: 'Returns an active page by ID or slug.',
        summary: 'Show page',
        tags: ['Pages'],
        parameters: [
            new OA\Parameter(
                name: 'page',
                description: 'Page ID or slug',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'string', example: 'about-us'),
            ),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Page returned.'),
            new OA\Response(response: 404, description: 'Page not found.'),
        ],
    )]
    public function show(string $page): JsonResponse
    {
        $page = Page::query()
            ->with([
                'parent:id,page_id,name,title,slug,template,order,status',
                'child' => function ($query): void {
                    $query
                        ->status()
                        ->select([
                            'id',
                            'page_id',
                            'name',
                            'title',
                            'slug',
                            'template',
                            'order',
                            'status',
                        ])
                        ->orderBy('order');
                },
            ])
            ->status()
            ->where(function ($query) use ($page): void {
                $query->where('slug', $page);

                if (ctype_digit($page)) {
                    $query->orWhere('id', (int) $page);
                }
            })
            ->first();

        if (! $page) {
            return $this->jsonResponse(
                General::FALSE,
                'Page not found.',
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->jsonResponse(
            General::TRUE,
            'Page returned successfully.',
            data: $this->formatPage($page, includeDetails: true, includeChildren: true)
        );
    }

    private function formatPage(
        Page $page,
        bool $includeDetails = false,
        bool $includeChildren = false
    ): array {
        $data = [
            'id' => $page->id,
            'page_id' => $page->page_id,
            'name' => $page->name,
            'title' => $page->title,
            'slug' => $page->slug,
            'image_one' => $page->image_one,
            'image_one_url' => $page->full_image_link,
            'image_one_alt' => $page->image_one_alt,
            'excerpt' => $page->excerpt,
            'template' => $page->template,
            'order' => $page->order,
            'status' => $page->status,
        ];

        if ($includeDetails) {
            $data = [
                ...$data,
                'image_two' => $page->image_two,
                'image_two_alt' => $page->image_two_alt,
                'breadcrumbs_image_url' => $page->breadcrumbs_image_link,
                'description' => $page->description,
                'images' => $page->images,
                'metadata' => $page->metadata,
                'seo' => $page->seo,
                'parent' => $page->parent ? $this->formatPage($page->parent) : null,
            ];
        }

        if ($includeChildren) {
            $data['children'] = $page->child
                ? $page->child->map(fn (Page $child): array => $this->formatPage($child))->values()->all()
                : [];
        }

        return $data;
    }
}
