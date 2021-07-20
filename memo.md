## goutte 設定
- composer require weidner/goutte

- config/app.php
 'providers' => [
/*
* Package Service Providers...
*/
    Weidner\Goutte\GoutteServiceProvider::class,
 ]

'aliases' => 
    // ...
    'Goutte' => Weidner\Goutte\GoutteFacade::class,


## laravel 日本語設定
- my.cnf
[mysqld]
character-set-server = utf8mb4
collation-server = utf8mb4_general_ci

[client]
default-character-set=utf8mb4

- docker-compose.yml
mysql
    volumes:
        - ./my.cnf:/etc/mysql/conf.d/my.cnf 追加

- config/database.php
'collation' => 'utf8mb4_general_ci'


## docker 動かしてるぽい
./vendor/bin/sail up -d --build
俺は動かなかったからphp artisan serve

## コマンド作成
php artisan make:command ScrapeJoseikin

app/Console/Commands/ScrapeJoseikin.php > handle function


## Controller 作成
php artisan make:controller MathController

## docker環境手順
docker-compose up -d
docker-exec app bash
composer install

https://josekin-susume.com/ 
https://localhost:10080/
Forbidden


## モデル作成
php artisan make:model Scraping

## scrapings table
organ id nn 外した(foreign key の制約のため)


## scrapings テーブルにカラム追加
php artisan make:migration add_hostname_pathname_selector_title_to_scrapings_table --table=scrapings

## INFOSにcontentカラム追加
手動で

