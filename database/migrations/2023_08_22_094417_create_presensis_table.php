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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik');
            $table->date('tgl');
            $table->time('jam_in');
            $table->time('jam_out')->nullable();
            $table->text('foto_in');
            $table->text('foto_out')->nullable();
            $table->text('lokasi_in');
            $table->text('lokasi_out')->nullable();
            $table->timestamps();
            $table->foreign('nik')->references('nik')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
