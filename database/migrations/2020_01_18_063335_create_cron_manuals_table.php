<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cron_manuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cron_job_slug');
            $table->text('cron_job_status');
            $table->timestamps('cron_job_start_time');
            $table->timestamps('cron_job_end_time');
            $table->text('auto_update_status');
            $table->timestamps('create_time');
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
        Schema::dropIfExists('cron_manuals');
    }
}
