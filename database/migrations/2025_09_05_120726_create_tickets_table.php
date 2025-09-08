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
            $table->string('seat_number');             // Số ghế
            $table->decimal('price', 10, 2);           // Giá vé
            $table->boolean('status')->default(0);     // Trạng thái: 0=chưa bán, 1=đã bán
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
