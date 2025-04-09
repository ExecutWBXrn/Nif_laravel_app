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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('builder');
            $table->foreignIdFor(\App\Models\User::class)->constrained('users', 'id');
            $table->string('complex')->nullable();
            $table->string('city')->nullable();
            $table->decimal('price');
            $table->string('street');
            $table->boolean('is_sell')->default(true);
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('amount_of_room')->nullable();
            $table->unsignedTinyInteger('floor')->nullable();
            $table->unsignedTinyInteger('floor_estate')->nullable();
            $table->unsignedSmallInteger('square')->nullable();
            $table->unsignedTinyInteger('square_of_kitchen')->nullable();
            $table->date('building_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
