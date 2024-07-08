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
        Schema::create('images', function (Blueprint $table) {
			$table->id();
            $table->string('disk', 255)->nullable();
            $table->string('path', 255)->nullable();
            $table->string('mime_type', 255)->nullable();
            $table->text('dir')->nullable();
			$table->string('large',255)->nullable();
			$table->string('original',255)->nullable();
			$table->string('medium',255)->nullable();
			$table->string('small',255)->nullable();
            $table->text('description')->nullable();
			$table->string('extension',255)->nullable();
            $table->text('name')->nullable();
            $table->integer('size')->nullable();
			$table->morphs('fileable');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            Schema::dropIfExists('images');
        });
    }
};
