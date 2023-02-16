<?php

namespace App\Repository;

use App\Models\ParseLink;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

class ParseLinkRepository
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLinks(): Collection
    {
        return ParseLink::all()->pluck('link');
    }

    public function checkExistence(string $link): ResponseInterface
    {
        return $this->client->get($link);
    }
}
