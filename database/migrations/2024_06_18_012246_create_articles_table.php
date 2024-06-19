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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('desc', 500)->nullable();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('thumb', 500)->nullable();
            $table->unsignedInteger('created_by_id');
            $table->tinyInteger('status')->default(1)->comment('1: active, 0: inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
