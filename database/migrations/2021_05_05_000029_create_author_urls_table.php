<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_urls', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('author_id')->comment('ライターID')->constrained('users');
			$table->unsignedTinyInteger('type_id')->comment('URLタイプ');
			$table->string('url')->comment('URL');
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
        Schema::dropIfExists('author_urls');
    }
}
