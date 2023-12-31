<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->float('price')->unsigned();
            $table->boolean('exist');
            $table->integer('count')->default(0);
            $table->timestamps();

          //  $table->foreignId('category_id');
          //  $table->foreign('category_id')->on('categories')->references('id');
          $table->foreignId('category_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
