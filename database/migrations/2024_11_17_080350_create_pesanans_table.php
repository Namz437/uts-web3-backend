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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kontrakan_id'); 
            $table->unsignedBigInteger('diskon_id')->nullable(); 
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->integer('harga_asli'); 
            $table->integer('harga_akhir'); 
            $table->string('status')->default('pending');
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('kontrakan_id')->references('id')->on('kontrakans')->onDelete('cascade');
            $table->foreign('diskon_id')->references('id')->on('diskons')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key to users table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
