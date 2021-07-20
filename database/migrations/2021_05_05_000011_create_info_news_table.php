<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_news', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('info_id')->comment('取得情報ID')->constrained('infos');
			$table->string('url')->nullable()->comment('取得URL');
			$table->string('title')->nullable()->comment('取得タイトル');
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
        Schema::dropIfExists('info_news');
    }
}
