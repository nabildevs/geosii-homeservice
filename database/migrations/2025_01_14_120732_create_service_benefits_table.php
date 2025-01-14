<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_service_id')->constrained()->cascadeOnDelete();

            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_benefits');
    }
};
