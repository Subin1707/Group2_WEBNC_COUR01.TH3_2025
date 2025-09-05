<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theaters', function (Blueprint $table) {
            $table->id();
            $table->string('name');     // Tên rạp
            $table->string('address');  // Địa chỉ
            $table->string('region')->nullable(); // Khu vực
            $table->string('phone')->nullable();  // Số điện thoại
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theaters');
    }
};
