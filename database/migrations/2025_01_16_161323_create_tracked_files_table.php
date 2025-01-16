<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('tracked_files', function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'normalized_path', length: 512)->nullable(false)->unique(true);
            $table->foreignId('tracked_directory_id')
                ->nullable(false)
                ->constrained('tracked_directories')
                ->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('tracked_file_tracked_tag', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('tracked_file_id')
                ->constrained('tracked_files')
                ->cascadeOnDelete();
            $table->foreignId('tracked_tag_id')
                ->constrained('tracked_tags')
                ->cascadeOnDelete();
            $table->unique(['tracked_file_id', 'tracked_tag_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracked_file_tracked_tag');
        Schema::dropIfExists('tracked_files');
    }
};
