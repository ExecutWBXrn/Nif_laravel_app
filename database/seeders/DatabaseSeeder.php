<?php

namespace Database\Seeders;

use App\Models\Estate;
use App\Models\estate_photos;
use App\Models\EstatePhotos;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->admin()->create();
        EstatePhotos::factory(100)->create();
    }
}
