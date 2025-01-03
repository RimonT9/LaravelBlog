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
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('message', 'message_id');

            $table->unsignedBigInteger('message_id')->change();

            $table->index('message_id', 'comment_message_idx');

            $table->foreign('message_id', 'comment_message_fk')->on('messages')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comment_message_fk');
            
            $table->dropIndex('comment_message_idx');

            $table->unsignedInteger('message_id');
            
            $table->text('message_id')->change();
            
            $table->renameColumn('message_id', 'message');
        });
    }
};
