<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Symfony\Component\HttpClient\HttpClient;
use Goutte\Client;

class CrawlPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to crawl posts';

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
        for ($i = 5471; $i <= 5802; $i++)
        {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $uri = "http://www.pakhtakor.uz/news/cnews/$i";
            $crawler = $client->request('GET', $uri);

            $img_url = 'www.pakhtakor.uz' . $crawler->filter('.img-wrap > img')->attr('src');
            $title = $crawler->filter('.news-title > h4')->text();
            $temp_body = $crawler->filter('.post-text > p, .post-text > div')->each(fn($node) => $node->text());
            $temp_body = array_filter($temp_body, fn($value) => !is_null($value) && $value !== '');
            $body = implode("\n", $temp_body);

            $post = new Post();
            $post->img_url = $img_url;
            $post->title = $title;
            $post->body = $body;

            $post->save();
        }

        return 0;
    }
}
