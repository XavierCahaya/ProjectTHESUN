<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('locale', 10);
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('itinerary')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->timestamps();

            $table->unique(['package_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_translations');
    }
};
