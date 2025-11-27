<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('library_uid')->nullable()->after('usertype');
            $table->enum('account_type', ['admin', 'staff'])->default('staff')->after('library_uid');
            $table->enum('approval_status', ['pending', 'approved'])->default('approved')->after('account_type');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('library_uid');
            $table->dropColumn('account_type');
            $table->dropColumn('approval_status');
        });
    }
};
