<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Scraping;
use App\Models\Info;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class ScrapingController extends Controller
{
    public function index()
    {
        // $hostname = "https://www.city.hachioji.tokyo.jp";
        // $pathname = "/kurashi/sangyo/002/002/005/index.html";
        // $crawler = \Goutte::request('GET', $hostname . $pathname);
        // $joseikin_list = [];
        // $crawler->filter('#main > div.boxSection.boxCateList.clearfix > div > div > ul > li > a')->each(function ($node) use ($hostname, &$joseikin_list) {
        //     $link = $node->attr("href");
        //     $joseikin_list[$node->text()] = $hostname . $link;
        // });

        $scrapings = Scraping::all();
        foreach($scrapings as $scraping) {
            // dump($scraping->code);
            // dump($scraping->url);
            // dump($scraping->selector);

        }


        // return View::make('scraping.index',compact('joseikin_list', 'hostname'));
        return View::make('scraping.index', compact('scrapings'));
    }

    public function add(Request $request)
    {
        $new_scraping = new Scraping;
        $new_scraping->code = $request->name;
        $new_scraping->hostname = $request->hostname;
        $new_scraping->pathname = $request->pathname;
        $new_scraping->selector = $request->selector;
        $new_scraping->url = $request->hostname. $request->pathname;

        // $new_scraping->code = 'コード'; // code not nullの為適当に代入
        $new_scraping->type_id = 1; // type_id not nullの為適当に代入
        $new_scraping->scraping_time = date("Y/m/d H:i:s"); // scraping_time not nullの為適当に代入

        // $hostname = $new_scraping->hostname;
        // $crawler = \Goutte::request('GET', $hostname . $new_scraping->pathname);
        // $joseikin_list = [];
        // $crawler->filter($new_scraping->selector)->each(function ($node) use ($hostname, &$joseikin_list) {
        //     $link = $node->attr("href");
        //     $joseikin_list[$node->text()] = $hostname . $link;
        // });

        // $new_scraping->contents = serialize($joseikin_list);
        // dump($new_scraping->id);
        $new_scraping->save();

        // foreach ($joseikin_list as $key => $value) {
        //     $new_info = new Info;
        //     $new_info->type_id = 1; //type_id not nullの為適当に代入
        //     $new_info->content = $key;
        //     $new_info->scraping_id = $new_scraping->id;
        //     $new_info->save();
        // }

        return redirect()->route('index');
        // return View::make('scraping.index');
    }

    public function list()
    {
        $scrapings = Scraping::all();
        // foreach($scrapings as $scraping) {
        //     dump($scraping->id);
        //     foreach ($scraping->infos as $info) {
        //         dump($info->content);
        //         // dump($info->url);
        //     }
        // }

        return View::make('scraping.list',compact('scrapings'));
    }
}
