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
        Schema::table('admins', function ( $table) {
            $table->enum('role', ['admin', 'super_admin'])->default('admin')->nullable();
            $table->enum('active', ['0', '1'])->default('0')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function($table) {
            $table->dropColumn('role');
            $table->dropColumn('active');
        });
    }
};
