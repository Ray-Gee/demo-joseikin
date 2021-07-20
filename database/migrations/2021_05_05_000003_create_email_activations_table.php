<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_activations', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('user_id')->comment('ユーザーID')->constrained('users');
			$table->string('email')->comment('メールアドレス');
			$table->string('token',100)->comment('トークン');
			$table->dateTime('ttl')->comment('有効期限時間');
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
        Schema::dropIfExists('email_activations');
    }
}
