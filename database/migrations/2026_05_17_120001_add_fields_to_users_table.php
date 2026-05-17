<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tenant_id')->nullable()->after('id')->index();
            $table->string('avatar')->nullable()->after('name');
            $table->boolean('is_active')->default(true)->after('remember_token');
            $table->bigInteger('storage_used')->default(0)->after('is_active'); // bytes
            $table->timestamp('last_login_at')->nullable()->after('storage_used');
            $table->string('last_login_ip', 45)->nullable()->after('last_login_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->nullOnDelete();
        });

        Schema::table('tenants', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('id');
            $table->string('plan')->default('starter')->after('company_name'); // starter, professional, enterprise
            $table->bigInteger('storage_limit')->default(10737418240)->after('plan'); // 10 GB in bytes
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn(['tenant_id', 'avatar', 'is_active', 'storage_used', 'last_login_at', 'last_login_ip']);
        });

        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'plan', 'storage_limit']);
        });
    }
};
