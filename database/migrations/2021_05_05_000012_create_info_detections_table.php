<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoDetectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_detections', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('info_id')->comment('取得情報ID')->constrained('infos');
			$table->string('before_code', 1000)->nullable()->comment('変更前コード');
			$table->string('after_code', 1000)->nullable()->comment('変更後のコード');
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
        Schema::dropIfExists('info_detections');
    }
}
