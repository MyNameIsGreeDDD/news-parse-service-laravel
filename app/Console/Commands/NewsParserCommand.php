<?php

namespace App\Console\Commands;

use App\Services\LogService;
use App\Services\NewsService;
use App\Services\ParseLinkService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewsParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсит ресурс новостей';

    private ParseLinkService $linkService;
    private NewsService $newsService;
    private LogService $logService;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->di();

        foreach ($this->linkService->getLinks() as $link) {
            $firstMark = microtime(1);
            $response = $this->linkService->checkExistence($link);
            $lastMark = microtime(1);

            $this->logService->log([
                'request_method' => 'GET',
                'url' => $link,
                'http_code' => $response->getStatusCode(),
                'body' => $response->getBody()->getContents(),
                'execution_time' => $lastMark - $firstMark,
                'datetime' => Carbon::now()
            ]);

            if ($response->getStatusCode() !== 200) {
                continue;
            }

            $reader = $this->linkService->parseLink($link);

            foreach ($reader->get_items() as $item) {
                $this->newsService->updateOrCreate(
                    ['title' => $item->get_title()],
                    [
                        'description' => $item->get_description(),
                        'datetime' => Carbon::parse($item->get_date('d-m-y m:h:s')),
                        'author' => $item->get_author()?->getEmail()
                    ]);
            }
        }

        return 0;
    }

    public function di()
    {
        $this->linkService = app(ParseLinkService::class);
        $this->newsService = app(NewsService::class);
        $this->logService = app(LogService::class);
    }
}
