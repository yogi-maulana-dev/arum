<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('file_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained()->cascadeOnDelete();
            $table->foreignId('shared_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('shared_with')->nullable()->constrained('users')->nullOnDelete();
            $table->string('shared_email')->nullable(); // for external shares
            $table->string('token', 64)->unique(); // public link token
            $table->string('permission', 20)->default('read'); // read, write
            $table->boolean('is_public')->default(false);
            $table->string('password')->nullable(); // optional link password
            $table->integer('download_limit')->nullable(); // null = unlimited
            $table->integer('download_count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file_shares');
    }
};
