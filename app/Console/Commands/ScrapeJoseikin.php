<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Scraping;
use App\Models\Info;
use Exception;

class ScrapeJoseikin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:joseikin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Joseikin';

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
        $scrapings_data = Scraping::all();
        $joseikin_list = [];

            foreach ($scrapings_data as $scraping_data) {
                $hostname = $scraping_data->hostname;
                $pathname = $scraping_data->pathname;
                $url = $hostname . $pathname;

                try {
                    $crawler = \Goutte::request('GET', $url);

                    $crawler->filter($scraping_data->selector)->each(function ($node) use ($hostname, &$joseikin_list, $scraping_data) {
                        $href = $node->attr("href");
                        $joseikin_list[$node->text()] = $hostname . $href;

                        if(!Info::where('content', $node->text())->exists()) {
                            dump('データがデータベース内に存在しない(新しい情報です)');
                            // 保存処理を書く
                            $info = new Info();
                            $info->content = $node->text();
                            $info->type_id = 1;
                            $info->scraping_id = $scraping_data->id;
                            // $info->href = $href;
                        }
                    });
                } catch (Exception $e) {
                    report($e);
                    echo('スクレイピングコマンド時エラー'. PHP_EOL);
                    // return false;
                }

            }

        dump($joseikin_list);
    }
}
