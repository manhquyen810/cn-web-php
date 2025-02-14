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
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); 
            $table->string('title', 150); 
            $table->string('director', 100); 
            $table->date('release_date');
            $table->integer('duration');
            $table->unsignedBigInteger('cinema_id'); 

            $table->foreign('cinema_id')
                  ->references('id')
                  ->on('cinemas')
                  ->onDelete('cascade'); 

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
