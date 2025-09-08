<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('showtime_id'); // FK đến suất chiếu
            $table->string('seat_number');             // Ghế ngồi (VD: A10)
            $table->decimal('price', 8, 2);            // Giá vé
            $table->enum('status', ['available', 'booked'])->default('available'); // Trạng thái vé
            $table->timestamps();

            $table->foreign('showtime_id')
                ->references('id')->on('showtimes')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
