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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name', 256);
            $table->string('alias', 256);
            $table->text('description');
            $table->decimal('latitude', 18, 16);
            $table->decimal('longitude', 18, 16);
            $table->string('location', 256);
            $table->string('image_main_path', 256)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();

            $table->foreign('cluster_id')
                ->references('id')
                ->on('clusters')
                ->onDelete('restrict');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
