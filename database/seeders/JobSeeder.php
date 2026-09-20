<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagNames = ['PHP', 'Laravel', 'Vue.js', 'DevOps', 'Remote', 'Symfony', 'Docker'];

        $tags = collect($tagNames)->map(function ($name) {
            return Tag::firstOrCreate(['name' => $name]);
        });

        Job::factory(20)
            ->hasAttached($tags->random(2)) // Attache 2 tags aléatoires parmi la liste à chaque job
            ->create(new Sequence([
                'featured' => false,
                'schedule' => 'Full Time'
            ], [
                'featured' => true,
                'schedule' => 'Part Time'
            ]));
    }
}
