<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(3) /* 3 users com 1 task cada */
            ->hasTasks(1) 
            ->create();
    }
}
