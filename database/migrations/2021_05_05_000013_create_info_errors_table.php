<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_errors', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('info_id')->comment('取得情報ID')->constrained('infos');
			$table->string('error', 1000)->comment('エラー内容');
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
        Schema::dropIfExists('info_errors');
    }
}
