<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //مش راضي يعمل constrained هان مع جدول الستورز
            $table->foreignId('store_id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->decimal('price')->default(0);
            $table->string('product_image');
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->decimal('discount')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
