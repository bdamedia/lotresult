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
            $table->string('mobile_no');
            $table->text('species');
            $table->string('transaction_id');
            $table->string('amount');
            $table->text('pay_mode');
            $table->text('bank');
            $table->text('status');
            $table->text('user_id');
            $table->ipAddress('user_ip');
            $table->text('user_device');
            $table->text('user_browser');
            $table->text('accountant_name');
            $table->timestamps('purchased_time');
            $table->timestamps('approver_time');
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
