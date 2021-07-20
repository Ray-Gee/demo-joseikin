<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrapings', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('organ_id')->comment('機関ID')->constrained('organs');
			$table->unsignedTinyInteger('type_id')->comment('タイプ');
			$table->string('url')->comment('スクレイピングURL');
			$table->string('code',100)->comment('対象コード');
			$table->dateTime('scraping_time')->comment('スクレイピングする時間');
			$table->string('memo', 1000)->nullable()->comment('社内メモ');
            $table->timestamps();
            $table->string('hostname');
            $table->string('pathname');
            $table->string('selector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scrapings');
    }
}
