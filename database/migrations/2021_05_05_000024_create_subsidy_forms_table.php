<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_forms', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('subsidy_detail_id')->comment('補助金・助成金詳細ID')->constrained('subsidy_details');
			$table->foreignId('form_id')->comment('形態ID')->constrained('forms');
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
        Schema::dropIfExists('subsidy_forms');
    }
}
