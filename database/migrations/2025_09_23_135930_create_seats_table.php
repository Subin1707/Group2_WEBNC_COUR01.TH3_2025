<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');     // FK đến phòng
            $table->string('seat_number');             // Ký hiệu ghế (VD: A1, A2, B3...)
            $table->enum('status', ['available', 'booked'])->default('available');
            $table->timestamps();

            $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
