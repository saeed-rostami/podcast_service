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
        Schema::create('episode_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId("episode_id")
                ->references("id")
                ->on("episodes")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('file_path');
            $table->string('duration');
            $table->tinyInteger('extension_type')->comment('1 => audio, 2 video');
            $table->json('metas')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episode_files');
    }
};
