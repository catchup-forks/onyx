<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeesManagement extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('leaves', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
        	$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        	$table->date('from');
        	$table->date('to');
        	$table->boolean('approved');
        	$table->timestamps();
		});

        Schema::create('banks', function(Blueprint $table){
        	$table->increments('id');
        	$table->string('name', 100);
        	$table->string('swift', 12);
        	$table->string('iban', 34);
        	$table->timestamps();
		});

        Schema::create('accounts', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedInteger('bank_id');
        	$table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedBigInteger('contact_id');
        	$table->string('contact_type', 12);
        	$table->string('number', 18);
        	$table->timestamps();
		});

        Schema::create('payrolls', function(Blueprint $table){
        	$table->unsignedBigInteger('user_id')->primary();
        	$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        	$table->boolean('on_bank');
        	$table->float('amount');
        	$table->char('duration', 1);
		});

        Schema::create('payroll_payments', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('payroll_id');
        	$table->foreign('payroll_id')->references('user_id')->on('payrolls')->onUpdate('cascade')->onDelete('cascade');
        	$table->float('incentive')->default(0);
        	$table->float('deduction')->default(0);
        	$table->boolean('status')->default(0);
        	$table->date('due_date');
		});

        Schema::create('devices', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('notification_token', 255)->nullable();
			$table->string('api_token', 64)->nullable();
			$table->string('last_ip', 15);
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    	Schema::drop('devices');
		Schema::drop('payroll_payments');
    	Schema::drop('payrolls');
    	Schema::drop('accounts');
    	Schema::drop('banks');
        Schema::drop('leaves');
    }
}
