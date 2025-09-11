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
            $table->unsignedBigInteger('user_id')->nullable(); // ai đặt (nếu có login)
            $table->unsignedBigInteger('showtime_id');         // đặt vé cho suất chiếu nào
            $table->integer('total_tickets')->default(1);      // số vé đặt
            $table->decimal('total_price', 10, 2);             // tổng tiền
            $table->string('status')->default('pending');      // trạng thái: pending / confirmed / cancelled
            $table->timestamps();

            // Quan hệ
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('showtime_id')->references('id')->on('showtimes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
