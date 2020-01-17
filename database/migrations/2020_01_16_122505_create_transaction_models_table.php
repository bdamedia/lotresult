<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->text('full_name');
            $table->text('member_type');
            $table->text('mobile_no');
            $table->text('species');
            $table->text('transaction_id');
            $table->text('pay_mode');
            $table->text('bank');
            $table->text('status');
            $table->text('user_address');
            $table->text('user_ip');
            $table->text('user_device');
            $table->text('user_browser');
            $table->text('accountant_name');
            $table->text('purchased_time');
            $table->text('approver_time');
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
        Schema::dropIfExists('transaction_models');
    }
}
