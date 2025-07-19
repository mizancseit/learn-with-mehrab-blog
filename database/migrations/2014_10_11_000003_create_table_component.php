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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('professional_name');
            $table->string('slug')->unique();
            $table->string('action');
            $table->longText('icons')->nullable();
            $table->longText('comments')->nullable();
            $table->unsignedBigInteger('module_id');
            $table->boolean('is_active')->default(1);
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
