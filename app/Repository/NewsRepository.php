<?php

namespace App\Repository;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class NewsRepository
{
    public function updateOrCreate(array $uniqueValues, array $updateValues)
    {
        return News::updateOrCreate($uniqueValues, $updateValues);
    }

    public function getNews(int $limit, int $page, string $orderBy): Collection
    {
        return News::orderBy('datetime', $orderBy)->limit($limit)->offset($page * $limit - $limit)->get();
    }
}
