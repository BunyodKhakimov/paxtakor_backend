<?php

namespace App\Console\Commands;

use App\Models\ClubStanding;
use Illuminate\Console\Command;
use App\Models\Post;
use Symfony\Component\HttpClient\HttpClient;
use Goutte\Client;

class CrawlTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to crawl table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $uri = "http://www.pakhtakor.uz/ru";
        $crawler = $client->request('GET', $uri);

        $crawler->filter('.best-players-list')
            ->first()
            ->filter('.item')
            ->each(function($node) {
                $table_item = new ClubStanding();
                $table_item->number = $node->filter('.number')->text();
                $table_item->team = $node->filter('.team')->text();
                $table_item->games = $node->filter('.games')->text();
                $table_item->goals = $node->filter('.goals')->text();
                $table_item->achievement = $node->filter('.achievement')->text();
                $table_item->save();
            });

        return 0;
    }
}
