<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_category_id')->constrained('portfolio_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('location');
            $table->string('project_type');
            $table->string('room_type')->nullable();
            $table->string('design_style')->nullable();
            $table->longText('description')->nullable();
            $table->year('year')->nullable();
            $table->string('main_image')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
