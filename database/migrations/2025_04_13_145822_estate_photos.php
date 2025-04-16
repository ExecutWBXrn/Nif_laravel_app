<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estate_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Estate::class)->constrained('estates', 'id')->cascadeOnDelete();
            $table->text('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Storage::disk('public')->deleteDirectory("estate_photo");
        Schema::dropIfExists('estate_photos');
    }
};
