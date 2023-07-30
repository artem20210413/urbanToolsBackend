<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->unique();
            $table->string('alias', 256);
            $table->string('description', 1024)->nullable();
            $table->decimal('latitude', 18, 16);
            $table->decimal('longitude', 18, 16);
            $table->string('location', 256);
            $table->string('image_main_path', 256)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
