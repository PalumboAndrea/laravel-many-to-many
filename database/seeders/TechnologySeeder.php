<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['HTML5', 'CSS3', 'JS ES6', 'PHP', 'Vue 3', 'Laravel 9', 'Bootstrap 5', 'Vite', 'Composer', 'Node.js', 'SCSS', 'React', 'Angular.js','C++', 'Python'];
        
        foreach ($technologies as $techName) {
            $tech = new Technology();
            $tech->name = $techName;
            $tech->slug = Str::slug($techName);
            $tech->color = $faker->unique()->hexColor();
            $tech->save();
            $tech->slug = $tech->slug . "-$tech->id";
            $tech->update();
        }
    }
}
