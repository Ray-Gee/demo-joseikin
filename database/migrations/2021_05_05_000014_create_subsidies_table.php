<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidies', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('organ_id')->comment('機関ID')->constrained('organs');
			$table->string('name')->comment('名称');
			$table->string('url')->comment('URL');
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
        Schema::dropIfExists('subsidies');
    }
}
