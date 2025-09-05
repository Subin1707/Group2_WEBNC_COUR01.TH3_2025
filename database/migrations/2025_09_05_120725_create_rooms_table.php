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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theater_id')->constrained()->onDelete('cascade'); // rạp
            $table->string('name'); // tên phòng
            $table->string('type'); // loại phòng (2D, 3D, IMAX, VIP...)
            $table->integer('total_seats'); // tổng số ghế
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
