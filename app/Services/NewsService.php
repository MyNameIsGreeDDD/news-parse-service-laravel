<?php

namespace App\Services;

use App\Repository\NewsRepository;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
    private NewsRepository $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function updateOrCreate(array $uniqueValues, array $updateValues)
    {
        return $this->newsRepository->updateOrCreate($uniqueValues,$updateValues);
    }

    public function getNews(int $limit, int $page, string $orderBy): Collection
    {
        return $this->newsRepository->getNews($limit, $page, $orderBy);
    }
}
