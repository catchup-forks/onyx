<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesSupport extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('categories', function(Blueprint $table){
            $table->string('image', 36)->default('')->after('parent_id');
        });

        Schema::table('items', function(Blueprint $table){
            $table->string('image', 36)->default('')->after('id');
        });

        Schema::table('products', function(Blueprint $table){
            $table->string('image', 36)->default('')->after('id');
        });

        Schema::create('item_images', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image', 36);
        });

        Schema::create('product_images', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image', 36);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('categories', function(Blueprint $table){
            $table->dropColumn('image');
        });

        Schema::table('items', function(Blueprint $table){
            $table->dropColumn('image');
        });

        Schema::table('products', function(Blueprint $table){
            $table->dropColumn('image');
        });

        Schema::drop('item_images');
        Schema::drop('product_images');
    }
}
