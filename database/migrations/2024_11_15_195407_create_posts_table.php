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
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->longText('content');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->enum('visibility', ['public', 'private'])->nullable()->default('public');
            $table->string('category')->nullable();
            $table->string('articale_cover')->nullable();
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
            $table->string('tag4')->nullable();
            $table->string('tag5')->nullable();
            $table->string('profile')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('featured')->nullable();
            $table->string('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
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