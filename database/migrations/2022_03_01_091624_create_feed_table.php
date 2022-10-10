<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // ニュースのタイトルを保存するカラム
            $table->string('link')->unique(); // ニュースのリンクを保存するカラム
            $table->string('date'); // ニュースの日付を保存するカラム
            $table->string('category'); // ニュースのカテゴリー（チーム名）を保存するカラム
            $table->string('newsId'); // ニュースのID（リンクURLより設定）を保存するカラム
            $table->string('description'); // ニュースの説明を保存するカラム
            $table->text('content'); // ニュースのID（リンクURLより設定）を保存するカラム
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
        Schema::dropIfExists('feeds');
    }
}
