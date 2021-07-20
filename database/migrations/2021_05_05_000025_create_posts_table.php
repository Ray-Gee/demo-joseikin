<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->string('title')->comment('タイトル');
			$table->string('image')->comment('サムネイル');
			$table->string('description')->nullable()->comment('ディスクリプション');
			$table->text('content')->comment('本文');
			$table->foreignId('author_id')->comment('ライターID')->constrained('users');
			$table->foreignId('subsidy_id')->comment('補助金・助成金ID')->constrained('subsidies');
			$table->unsignedTinyInteger('is_show')->default(0)->comment('表示・非表示');
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
        Schema::dropIfExists('posts');
    }
}
