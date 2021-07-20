<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_targets', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('subsidy_detail_id')->comment('補助金・助成金詳細ID')->constrained('subsidy_details');
			$table->foreignId('target_id')->comment('対象ID')->constrained('targets');
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
        Schema::dropIfExists('subsidy_targets');
    }
}
