<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('brand_name');
            $table->text('short_description')->nullable();
            $table->longText('about_description')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('address')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
