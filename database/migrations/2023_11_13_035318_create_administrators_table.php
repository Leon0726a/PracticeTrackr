<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->foreignId('user_id')->constrained(); // ユーザーテーブルへの外部キー
            $table->foreignId('community_id')->constrained(); // コミュニティテーブルへの外部キー
            $table->timestamps(); // 作成日時と更新日時

            $table->unique(['user_id', 'community_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrators');
    }
};
