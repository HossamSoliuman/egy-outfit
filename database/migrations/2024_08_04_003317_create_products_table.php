<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->foreignId('category_id')->constrained();
            $table->string('gender');
            $table->string('sku')->unique();
            $table->integer('stock');
            $table->float('rating')->default(0);
            $table->string('size');
            $table->string('color');
            $table->string('material');
            $table->string('cover');
            $table->foreignId('brand_id')->constrained();
            $table->decimal('discount', 5, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
