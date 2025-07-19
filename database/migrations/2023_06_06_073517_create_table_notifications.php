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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
			$table->foreignId('sender_id')
                ->constrained("users")
                ->onDelete('cascade');

			$table->foreignId('receiver_id')->nullable()
                ->constrained("users")
                ->onDelete('cascade');

            $table->string('notification_title')->nullable();
            $table->string('notification_details')->nullable();
            $table->string('notification_link')->nullable();
			$table->boolean('is_view_notification')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
