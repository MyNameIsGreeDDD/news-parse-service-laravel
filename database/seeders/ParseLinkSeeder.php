<?php

namespace Database\Seeders;

use App\Models\ParseLink;
use Illuminate\Database\Seeder;

class ParseLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParseLink::insertOrIgnore(['link' => 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss']);
    }
}
