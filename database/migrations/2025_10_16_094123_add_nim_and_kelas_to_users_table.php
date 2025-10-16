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
        Schema::table('user', function (Blueprint $table) {
             $table->string('nim', 20)->unique()->after('name');
             $table->unsignedBigInteger('kelas_id')->nullable()->after('nim');
             $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
            $table->dropColumn(['nim', 'kelas_id']);
            //
        });
    }
};
