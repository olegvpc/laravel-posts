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
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

						// $table->bigInteger('user_id')->unsigned();
						// $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
						// Можно короче
						$table->foreignId('user_id')->constrained()->cascadeOnDelete();

						$table->string('title');
						$table->text('content');

						$table->boolean('published')->default(true);
						$table->timestamp('published_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
