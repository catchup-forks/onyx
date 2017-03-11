<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('reviews', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
        	$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedTinyInteger('rating');
			$table->text('message');
			$table->boolean('approved')->default(0);
			$table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
		});

        Schema::create('currencies', function(Blueprint $table){
        	$table->increments('id');
        	$table->float('value', 10, 6)->default(1.0);
		});

        Schema::create('currency_locales', function(Blueprint $table){
        	$table->unsignedInteger('currency_id');
        	$table->char('locale', 2);
        	$table->primary(['currency_id', 'locale']);
        	$table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 25);
        	$table->char('symbol', 3);
        	$table->boolean('suffix')->default(1);
		});

        Schema::create('productions', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->tinyInteger('status')->default(0);
			$table->timestamps();
		});

        Schema::create('consumptions', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('production_id');
        	$table->foreign('production_id')->references('id')->on('productions')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedBigInteger('item_quantity_id');
        	$table->foreign('item_quantity_id')->references('id')->on('item_quantities')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedBigInteger('quantity');
		});

        Schema::create('deliveries', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('distributor_id')->nullable();
        	$table->foreign('distributor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        	$table->unsignedBigInteger('order_id');
        	$table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        	$table->timestamp('delivered_at');
        	$table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
		});

        Schema::create('warranties', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('product_id');
        	$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedInteger('duration_value');
        	$table->char('duration_unit', 1);
        	$table->text('description');
		});

        Schema::create('custom_warranties', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('order_line_id');
        	$table->foreign('order_line_id')->references('id')->on('order_lines')->onUpdate('cascade')->onDelete('cascade');
        	$table->timestamp('expires_at');
        	$table->text('description');
		});

        Schema::create('order_warranties', function(Blueprint $table){
        	$table->unsignedBigInteger('order_line_id');
        	$table->unsignedBigInteger('warranty_id');
        	$table->primary(['order_line_id', 'warranty_id']);
        	$table->foreign('order_line_id')->references('id')->on('order_lines')->onUpdate('cascade')->onDelete('cascade');
        	$table->foreign('warranty_id')->references('id')->on('warranties')->onUpdate('cascade')->onDelete('cascade');
        	$table->timestamp('expires_at');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    	Schema::drop('order_warranties');
    	Schema::drop('custom_warranties');
    	Schema::drop('warranties');
    	Schema::drop('deliveries');
    	Schema::drop('consumptions');
    	Schema::drop('productions');
    	Schema::drop('currency_locales');
    	Schema::drop('currencies');
        Schema::drop('reviews');
    }
}
