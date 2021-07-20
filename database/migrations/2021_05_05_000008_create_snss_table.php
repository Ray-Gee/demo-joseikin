<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snss', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('scraping_id')->comment('スクレイピングID')->constrained('scrapings');
			$table->unsignedTinyInteger('type_id')->comment('SNSタイプ');
			$table->string('memo', 1000)->nullable()->comment('社内メモ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snss');
    }
}
