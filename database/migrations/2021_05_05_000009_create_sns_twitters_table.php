<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnsTwittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sns_twitters', function (Blueprint $table) {
            $table->id()->comment('ID');
			$table->foreignId('sns_id')->comment('SNS ID')->constrained('snss');
			$table->string('consumer_key')->comment('コンシューマーキー');
			$table->string('consumer_secret')->comment('コンシューマーシークレット');
			$table->string('access_token')->comment('アクセストークン');
			$table->string('access_token_secret')->comment('アクセストークン シークレット');
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
        Schema::dropIfExists('sns_twitters');
    }
}
