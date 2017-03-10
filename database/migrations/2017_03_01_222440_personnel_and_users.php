<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonnelAndUsers extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('roles', function(Blueprint $table){
        	$table->increments('id');
        	$table->string('slug', 24);
		});

		Schema::create('role_locales', function(Blueprint $table){
			$table->unsignedInteger('role_id');
			$table->char('locale', 2);
			$table->primary(['role_id', 'locale']);
			$table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 100);
		});

        Schema::create('users', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->string('username', 255)->unique();
        	$table->string('password', 100);
        	$table->unsignedInteger('role_id');
        	$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        	$table->rememberToken();
        	$table->timestamps();
		});

        Schema::create('suppliers', function(Blueprint $table){
        	$table->increments('id');
        	$table->string('name', 100);
		});

        Schema::create('supplier_contacts', function(Blueprint $table){
        	$table->increments('id');
        	$table->unsignedInteger('supplier_id');
        	$table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 300);
        	$table->string('phone', 16);
        	$table->string('email', 255);
		});

        Schema::create('clients', function(Blueprint $table){
        	$table->unsignedBigInteger('user_id')->primary();
        	$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('first_name', 100);
        	$table->string('last_name', 100);
        	$table->date('birthdate');
        	$table->char('gender', 1);
		});

        Schema::create('phones', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('number', 16)->unique();
		});

        Schema::create('emails', function(Blueprint $table){
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('address', 255)->unique();
		});

        Schema::create('locations', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('parent_id')->nullable();
        	$table->foreign('parent_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedTinyInteger('type');
        	$table->float('latitude', 10, 6);
			$table->float('longitude', 10, 6);
		});

        Schema::create('location_locales', function(Blueprint $table){
        	$table->unsignedBigInteger('location_id');
        	$table->char('locale', 2);
        	$table->primary(['location_id', 'locale']);
			$table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 150);
		});

        Schema::create('addresses', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('contact_id');
        	$table->string('contact_type', 12);
        	$table->string('address_1', 500);
        	$table->string('address_2', 500)->nullable();
        	$table->unsignedBigInteger('city_id');
        	$table->foreign('city_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    	Schema::drop('addresses');
    	Schema::drop('location_locales');
    	Schema::drop('locations');
    	Schema::drop('emails');
    	Schema::drop('phones');
		Schema::drop('clients');
		Schema::drop('supplier_contacts');
		Schema::drop('suppliers');
		Schema::drop('users');
		Schema::drop('role_locales');
        Schema::drop('roles');
    }
}
