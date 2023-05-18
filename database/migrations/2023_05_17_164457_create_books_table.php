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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn')->unique();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('publication_year');
            $table->float('price');
            $table->integer('in_stock');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
