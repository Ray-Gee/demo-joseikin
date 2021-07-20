<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_details', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('subsidy_id')->comment('補助金・助成金ID')->constrained('subsidies');
			$table->dateTime('start_date')->comment('開始日');
			$table->dateTime('end_date')->comment('終了日');
			$table->foreignId('prefecture_id')->comment('都道府県ID')->constrained('prefectures');
			$table->foreignId('city_id')->comment('市区町村ID')->constrained('cities');
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
        Schema::dropIfExists('subsidy_details');
    }
}
