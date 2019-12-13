<?php
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('results', function ($table) {
            $table->bigIncrements('id');
            $table->text('lottery_region');
            $table->text('lottery_company');
            $table->json('prize_1');
            $table->json('prize_2');
            $table->json('prize_3');
            $table->json('prize_4');
            $table->json('prize_5');
            $table->json('prize_6');
            $table->json('prize_7');
            $table->json('prize_8');
            $table->json('prize_9');
            $table->dateTime('result_day_time');
            $table->timestamps('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
