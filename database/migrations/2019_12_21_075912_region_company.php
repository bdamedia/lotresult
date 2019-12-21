<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegionCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regionscompany', function ($table) {
            $table->bigIncrements('id');
            $table->text('lottery_region');
            $table->text('lottery_company');
            $table->text('lottery_company_name');
            $table->text('lottery_company_url');
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
        Schema::dropIfExists('regionscompany');
    }
}
