<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Technology;

class PostTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        $technologyIds = Technology::all()->pluck('id');
        foreach ($posts as $post) {
            $post->technologies()->attach($faker->randomElements($technologyIds, 3));
        }
    }
}
