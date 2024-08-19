<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\TaskStatus::insert([
            [
                'title' => 'not_started',
            ],
            [
                'title' => 'in_progress',
            ],
            [
                'title' => 'complited',
            ],
            [
                'title' => 'postponed',
            ],
        ]);
    }
}
