<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryData extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('quantity_units', function(Blueprint $table){
        	$table->increments('id');
        	$table->unsignedInteger('parent_id')->nullable();
			$table->foreign('parent_id')->references('id')->on('quantity_units')->onUpdate('cascade')->onDelete('set null');
			$table->float('value')->default(1);
		});

        Schema::create('quantity_unit_locales', function(Blueprint $table){
        	$table->unsignedInteger('quantity_unit_id');
        	$table->char('locale', 2);
        	$table->primary(['quantity_unit_id', 'locale']);
        	$table->foreign('quantity_unit_id')->references('id')->on('quantity_units')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 100);
        	$table->char('symbol', 3);
        	$table->boolean('suffix')->default(1);
		});

        Schema::create('categories', function(Blueprint $table){
        	$table->increments('id');
        	$table->unsignedInteger('parent_id')->nullable();
        	$table->foreign('parent_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        	$table->tinyInteger('type');
        	$table->tinyInteger('position')->default(0);
        	$table->softDeletes();
        	$table->timestamps();
		});

        Schema::create('category_locales', function(Blueprint $table){
        	$table->unsignedInteger('category_id');
        	$table->char('locale', 2);
        	$table->primary(['category_id', 'locale']);
        	$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 200);
        	$table->text('description');
		});

        Schema::create('products', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedInteger('category_id')->nullable();
        	$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        	$table->float('price');
        	$table->integer('quantity');
        	$table->unsignedInteger('quantity_unit_id')->nullable();
        	$table->foreign('quantity_unit_id')->references('id')->on('quantity_units')->onUpdate('cascade')->onDelete('set null');
        	$table->boolean('has_options')->default(0);
        	$table->boolean('is_service');
        	$table->softDeletes();
        	$table->timestamps();
		});

        Schema::create('product_locales', function(Blueprint $table){
        	$table->unsignedBigInteger('product_id');
        	$table->char('locale', 2);
        	$table->primary(['product_id', 'locale']);
        	$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 100);
        	$table->text('description');
		});

        Schema::create('services', function(Blueprint $table){
        	$table->unsignedBigInteger('product_id')->primary();
        	$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        	$table->unsignedInteger('duration_value');
        	$table->char('duration_unit', 1);
		});

        Schema::create('items', function(Blueprint $table){
			$table->bigIncrements('id');
			$table->unsignedInteger('category_id')->nullable();
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
			$table->float('price');
			$table->integer('quantity');
			$table->unsignedInteger('quantity_unit_id')->nullable();
			$table->foreign('quantity_unit_id')->references('id')->on('quantity_units')->onUpdate('cascade')->onDelete('set null');
			$table->boolean('has_options')->default(0);
			$table->softDeletes();
			$table->timestamps();
		});

        Schema::create('item_locales', function(Blueprint $table){
			$table->unsignedBigInteger('item_id');
			$table->char('locale', 2);
			$table->primary(['item_id', 'locale']);
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 100);
			$table->text('description');
		});

        Schema::create('options', function(Blueprint $table){
        	$table->increments('id');
        	$table->tinyInteger('multivalue');
		});

        Schema::create('option_locales', function(Blueprint $table){
        	$table->unsignedInteger('option_id');
        	$table->char('locale', 2);
        	$table->primary(['option_id', 'locale']);
        	$table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 100);
		});

        Schema::create('attributes', function(Blueprint $table){
        	$table->increments('id');
		});

        Schema::create('attribute_locales', function(Blueprint $table){
        	$table->unsignedInteger('attribute_id');
        	$table->char('locale', 2);
        	$table->primary(['attribute_id', 'locale']);
        	$table->foreign('attribute_id')->references('id')->on('attributes')->onUpdate('cascade')->onDelete('cascade');
        	$table->string('name', 100);
		});

        Schema::create('option_values', function(Blueprint $table){
        	$table->bigIncrements('id');
        	$table->unsignedInteger('option_id');
        	$table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
		});

        Schema::create('option_value_locales', function(Blueprint $table){
        	$table->unsignedBigInteger('option_value_id');
        	$table->char('locale', 2);
        	$table->primary(['option_value_id', 'locale']);
        	$table->foreign('option_value_id')->references('id')->on('option_values')->onUpdate('cascade')->onDelete('cascade');
		});

        Schema::create('product_options', function(Blueprint $table){
        	$table->unsignedBigInteger('product_id');
        	$table->unsignedInteger('option_id');
        	$table->primary(['product_id', 'option_id']);
        	$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
			$table->tinyInteger('sort')->default(0);
		});

		Schema::create('item_options', function(Blueprint $table){
			$table->unsignedBigInteger('item_id');
			$table->unsignedInteger('option_id');
			$table->primary(['item_id', 'option_id']);
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
			$table->tinyInteger('sort')->default(0);
		});

		Schema::create('product_attributes', function(Blueprint $table){
			$table->unsignedBigInteger('product_id');
			$table->unsignedInteger('attribute_id');
			$table->char('locale', 2);
			$table->primary(['product_id', 'attribute_id', 'locale']);
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('attribute_id')->references('id')->on('attributes')->onUpdate('cascade')->onDelete('cascade');
			$table->tinyInteger('sort')->default(0);
			$table->string('value', 100);
		});

		Schema::create('item_attributes', function(Blueprint $table){
			$table->unsignedBigInteger('item_id');
			$table->unsignedInteger('attribute_id');
			$table->char('locale', 2);
			$table->primary(['item_id', 'attribute_id', 'locale']);
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('attribute_id')->references('id')->on('attributes')->onUpdate('cascade')->onDelete('cascade');
			$table->tinyInteger('sort')->default(0);
			$table->string('value', 100);
		});

		Schema::create('product_quantities', function(Blueprint $table){
			$table->bigIncrements('id');
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->text('option_ids');
			$table->text('option_value_ids');
			$table->char('hash', 64)->unique();
			$table->integer('quantity');
		});

		Schema::create('item_quantities', function(Blueprint $table){
			$table->bigIncrements('id');
			$table->unsignedBigInteger('item_id');
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->text('option_ids');
			$table->text('option_value_ids');
			$table->char('hash', 64)->unique();
			$table->integer('quantity');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
		Schema::drop('item_quantities');
		Schema::drop('product_quantities');
		Schema::drop('item_attributes');
    	Schema::drop('product_attributes');
    	Schema::drop('item_options');
		Schema::drop('product_options');
    	Schema::drop('option_value_locales');
		Schema::drop('option_values');
    	Schema::drop('attribute_locales');
    	Schema::drop('attributes');
		Schema::drop('option_locales');
    	Schema::drop('options');
    	Schema::drop('item_locales');
    	Schema::drop('items');
    	Schema::drop('services');
		Schema::drop('product_locales');
		Schema::drop('products');
    	Schema::drop('category_locales');
		Schema::drop('categories');
		Schema::drop('quantity_unit_locales');
        Schema::drop('quantity_units');
    }
}
