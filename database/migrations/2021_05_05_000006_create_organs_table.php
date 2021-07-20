<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organs', function (Blueprint $table) {
			$table->id()->comment('ID');
			$table->string('name')->comment('名称');
			$table->string('name_kana')->comment('かな');
			$table->string('url',1000)->comment('機関URL');
			$table->foreignId('prefecture_id')->comment('都道府県ID')->constrained('prefectures');
			$table->foreignId('city_id')->comment('市区町村ID')->constrained('cities');
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
        Schema::dropIfExists('organs');
    }
}
