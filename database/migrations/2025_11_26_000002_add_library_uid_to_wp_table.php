<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wp', function (Blueprint $table) {
            $table->string('library_uid')->nullable()->after('libnumber');
            $table->foreignId('library_id')->nullable()->after('library_uid')->constrained('libraries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('wp', function (Blueprint $table) {
            $table->dropForeignKey(['library_id']);
            $table->dropColumn('library_uid');
            $table->dropColumn('library_id');
        });
    }
};
