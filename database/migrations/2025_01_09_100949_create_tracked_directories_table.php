<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('tracked_directories', function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'normalized_path', length: 512)->nullable(false)->unique(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracked_directories');
    }
};
