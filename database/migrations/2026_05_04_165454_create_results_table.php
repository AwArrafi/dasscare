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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_session_id')->constrained()->cascadeOnDelete();

            $table->integer('score_depression');
            $table->integer('score_anxiety');
            $table->integer('score_stress');

            $table->string('category_depression');
            $table->string('category_anxiety');
            $table->string('category_stress');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
