<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersAndPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    	Schema::create('order_statuses', function(Blueprint $table){
    		$table->smallIncrements('id');
		});

    	Schema::create('order_status_locales', function(Blueprint $table){
    		$table->unsignedSmallInteger('order_status_id');
    		$table->char('locale', 2);
    		$table->primary(['order_status_id', 'locale']);
    		$table->foreign('order_status_id')->references('id')->on('order_statuses')->onUpdate('cascade')->onDelete('cascade');
    		$table->string('name', 50);
		});

        Schema::create('orders', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('client_id');
        	$table->foreign('client_id')->references('user_id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedBigInteger('address_id')->nullable();
			$table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('set null');
			$table->unsignedBigInteger('managed_by')->nullable();
			$table->foreign('managed_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->unsignedSmallInteger('order_status_id');
			$table->foreign('order_status_id')->references('id')->on('order_statuses')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
		});

        Schema::create('order_lines', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('order_id');
        	$table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('product_quantity_id');
			$table->foreign('product_quantity_id')->references('id')->on('product_quantities')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('quantity');
		});

        Schema::create('purchases', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedInteger('supplier_id');
        	$table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('managed_by')->nullable();
			$table->foreign('managed_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->tinyInteger('status');
			$table->timestamps();
		});

        Schema::create('purchase_lines', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('purchase_id');
        	$table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('item_id');
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('item_quantity_id');
			$table->foreign('item_quantity_id')->references('id')->on('item_quantities')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('quantity');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    	Schema::drop('purchase_lines');
    	Schema::drop('purchases');
    	Schema::drop('order_lines');
        Schema::drop('orders');
        Schema::drop('order_status_locales');
        Schema::drop('order_statuses');
    }
}
