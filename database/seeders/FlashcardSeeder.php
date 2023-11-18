<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flashcard;

class FlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Flashcard::factory(10)->create();

    }
}
