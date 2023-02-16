<?php

namespace App\Services;

use App\Repository\ParseLinkRepository;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;
use Vedmant\FeedReader\Facades\FeedReader;

class ParseLinkService
{
    private ParseLinkRepository $parseLinkRepository;

    public function __construct(ParseLinkRepository $parseLinkRepository)
    {
        $this->parseLinkRepository = $parseLinkRepository;
    }

    public function getLinks(): Collection
    {
        return $this->parseLinkRepository->getLinks();
    }

    public function parseLink(string $link)
    {
        return FeedReader::read($link);
    }

    public function checkExistence(string $link)
    {
        return $this->parseLinkRepository->checkExistence($link);
    }
}
