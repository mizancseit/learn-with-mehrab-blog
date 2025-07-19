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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_main_menu')->default(0);
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->integer('sort_by')->default(0);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_highlight')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
