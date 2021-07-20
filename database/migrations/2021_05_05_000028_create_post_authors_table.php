<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_authors', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('post_id')->comment('名前　姓')->constrained('posts');
			$table->string('name',100)->comment('名前　名');
			$table->dateTime('profile')->nullable()->comment('自己紹介文');
			$table->string('email')->comment('メールアドレス');
			$table->string('password')->comment('パスワード');
			$table->string('remember_token', 100)->nullable()->comment('ログイン情報を記憶しておくcookie情報の一部');
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
        Schema::dropIfExists('post_authors');
    }
}
