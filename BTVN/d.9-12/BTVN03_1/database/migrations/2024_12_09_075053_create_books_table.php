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
            $table->string('title', 255); 
            $table->string('author', 255); 
            $table->year('publication_year'); 
            $table->string('genre', 100); 
            $table->unsignedBigInteger('library_id'); 
            $table->timestamps(); 

            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
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
