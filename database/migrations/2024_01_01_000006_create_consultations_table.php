<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('whatsapp');
            $table->string('email')->nullable();
            $table->string('project_location');
            $table->string('project_type');
            $table->string('room_type');
            $table->decimal('area_size', 10, 2);
            $table->string('estimated_budget')->nullable();
            $table->string('design_style')->nullable();
            $table->text('message')->nullable();
            $table->string('reference_file')->nullable();
            $table->enum('status', ['pending', 'contacted', 'scheduled', 'finished', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
