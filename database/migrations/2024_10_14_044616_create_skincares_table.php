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
        Schema::create('skincares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skincare_category_id')->constrained()->onDelete('cascade');
            $table->string('photo');
            $table->string('skincare_name');
            $table->string('qty');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skincares');
    }
};
