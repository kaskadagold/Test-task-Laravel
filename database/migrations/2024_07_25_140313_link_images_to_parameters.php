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
        Schema::table('parameters', function (Blueprint $table) {
            $table->foreignId('icon_id')
                ->nullable()
                ->after('type')
                ->references('id')
                ->on('images')
                ->nullOnDelete()
            ;
            $table->foreignId('icon_gray_id')
                ->nullable()
                ->after('icon_id')
                ->references('id')
                ->on('images')
                ->nullOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parameters', function (Blueprint $table) {
            $table->dropConstrainedForeignId('icon_id');
            $table->dropConstrainedForeignId('icon_gray_id');
        });
    }
};
