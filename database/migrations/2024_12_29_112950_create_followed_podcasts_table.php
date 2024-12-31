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
        Schema::create('followed_podcasts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger( 'user_id' );
            $table->foreignId("podcast_id")
                ->references("id")
                ->on("podcasts")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followed_podcasts');
    }
};
