<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_amounts', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('subsidy_detail_id')->comment('補助金・助成金詳細ID')->constrained('subsidy_details');
			$table->string('detail',1000)->comment('条件詳細');
			$table->unsignedInteger('min_amount')->comment('最低金額');
			$table->unsignedInteger('max_amount')->comment('最高金額');
			$table->unsignedTinyInteger('numerator_percent')->comment('補助率　分子');
			$table->unsignedTinyInteger('denominator_percent')->comment('補助率　分母');
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
        Schema::dropIfExists('subsidy_amounts');
    }
}
