<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['front-end','back-end','full-stack'];
        for ($i=0; $i<count($types); $i++){
            $type = new Type();
            $type->name = $types[$i];
            $type->color = $faker->unique()->hexColor();
            $type->slug = Str::slug($types[$i]);
            $type->save();
            $type->slug = $type->slug . "-$type->id";
            $type->update();
        }
    }
}
