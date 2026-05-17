<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->index();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('folder_id')->nullable()->index();
            $table->string('original_name');
            $table->string('stored_name')->unique();
            $table->string('disk')->default('local'); // local, s3
            $table->string('path');
            $table->bigInteger('size')->default(0); // bytes
            $table->string('mime_type', 100)->nullable();
            $table->string('extension', 20)->nullable();
            $table->boolean('is_encrypted')->default(false);
            $table->text('encryption_key')->nullable(); // encrypted key per file
            $table->boolean('is_starred')->default(false);
            $table->string('virus_status', 20)->default('pending'); // pending, clean, infected, skipped
            $table->string('checksum', 64)->nullable(); // SHA-256
            $table->text('description')->nullable();
            $table->integer('download_count')->default(0);
            $table->timestamps();
            $table->softDeletes(); // trash functionality

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('folder_id')->references('id')->on('folders')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
