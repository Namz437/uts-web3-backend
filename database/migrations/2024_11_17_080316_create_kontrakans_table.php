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
        Schema::create('kontrakans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_kontrakan_id')->nullable();
            $table->string('image');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('alamat');
            $table->timestamps();


            $table->foreign('kategori_kontrakan_id')->references('id')->on('kategori_kontrakans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrakans');
    }
};
