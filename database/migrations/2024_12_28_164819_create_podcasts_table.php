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
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories');
            $table->string('title')->unique();
            $table->string('cover');
            $table->text('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->tinyInteger('application_type')->default(1)->comment('1-podcast');
            $table->tinyInteger('access_level')->default(1)->comment('1-public, 2 private, 3 VIP');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcasts');
    }
};
