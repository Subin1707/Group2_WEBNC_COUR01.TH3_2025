<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theater_id'); // FK đến rạp
            $table->string('name');                   // Tên phòng (VD: Phòng 1)
            $table->string('type')->nullable();       // Loại phòng (2D, 3D, IMAX...)
            $table->integer('total_seats');           // Tổng số ghế
            $table->timestamps();

            $table->foreign('theater_id')
                  ->references('id')->on('theaters')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
