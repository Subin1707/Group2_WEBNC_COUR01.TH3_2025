<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Tên phim
            $table->text('description')->nullable(); // Mô tả
            $table->string('genre')->nullable();  // Thể loại
            $table->integer('duration')->default(90); // Thời lượng (phút)
            $table->date('release_date')->nullable(); // Ngày khởi chiếu
            $table->string('poster')->nullable(); // Ảnh poster
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
