<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');  // FK đến phim
            $table->unsignedBigInteger('room_id');   // FK đến phòng
            $table->dateTime('start_time');          // Giờ bắt đầu
            $table->dateTime('end_time')->nullable(); // Giờ kết thúc
            $table->decimal('price', 8, 2);          // Giá vé
            $table->timestamps();

            $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onDelete('cascade');

            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
