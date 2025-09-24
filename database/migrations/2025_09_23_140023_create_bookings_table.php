<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');       // Người đặt vé
            $table->unsignedBigInteger('showtime_id');   // Suất chiếu
            $table->unsignedBigInteger('seat_id');       // Ghế đã chọn
            $table->integer('quantity')->default(1);     // Số lượng vé (thường =1 nếu mỗi seat là 1 vé)
            $table->decimal('total_price', 10, 2);       // Tổng tiền
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('showtime_id')->references('id')->on('showtimes')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
