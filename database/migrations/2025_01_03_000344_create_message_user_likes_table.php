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
        Schema::create('message_user_likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('message_id');

            
            $table->index('user_id', 'mul_user_idx');
            $table->index('message_id', 'mul_message_idx');

            $table->foreign('user_id', 'mul_user_fk')->on('users')->references('id');
            $table->foreign('message_id', 'mul_message_fk')->on('messages')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_user_likes');
    }
};
