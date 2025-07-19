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
        Schema::table('permissions', function (Blueprint $table) {
            $table->foreignId('module_id')->constrained("modules")->onDelete('cascade');
            $table->foreignId('component_id')->constrained("components")->onDelete('cascade');
            $table->string('action')->nullable();
            $table->string('url')->nullable();
            $table->string('professional_name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_show_menu')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('module_id');
            $table->dropColumn('component_id');
            $table->dropColumn('action');
            $table->dropColumn('url');
            $table->dropColumn('professional_name');
            $table->dropColumn('slug');
            $table->dropColumn('is_show_menu');
        });
    }
};
