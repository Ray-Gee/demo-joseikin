<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_industries', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('subsidy_detail_id')->comment('補助金・助成金詳細ID')->constrained('subsidy_details');
			$table->foreignId('industry_id')->comment('業種ID')->constrained('industries');
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
        Schema::dropIfExists('subsidy_industries');
    }
}
