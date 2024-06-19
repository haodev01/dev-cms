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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('desc')->nullable();
            $table->longText('thumb')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedInteger('created_by_id');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->string('updated_by_name')->nullable();
            $table->string('created_by_name')->nullable();
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
        Schema::dropIfExists('blog_categories');
    }
};
