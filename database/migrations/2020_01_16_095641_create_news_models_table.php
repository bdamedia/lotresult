<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('content');
            $table->text('image');
            $table->text('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->text('news_slug');
            $table->timestamps('update_date');
            $table->timestamps('created_date');
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
        Schema::dropIfExists('lot_news');
    }
}
