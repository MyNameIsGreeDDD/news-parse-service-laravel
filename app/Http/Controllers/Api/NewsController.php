<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsCollection;
use App\Services\NewsService;
use Illuminate\Http\JsonResponse;

class NewsController extends BaseApiController
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(NewsRequest $request): JsonResponse
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);
        $sortBy = $request->input('sortBy', 'desc');

        return $this->success(new NewsCollection($this->newsService->getNews($limit, $page, $sortBy)));
    }
}
