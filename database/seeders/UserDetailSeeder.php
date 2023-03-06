<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\UserDetail;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            $newUserDetail  = new UserDetail();
            $newUserDetail->user_id = $user->id;
            $newUserDetail->bio = $faker->realTextBetween(200, 254);
            $newUserDetail->status = $faker->sentence(1, false);
            $newUserDetail->profile_image = $faker->imageUrl();
            $newUserDetail->save();
        }
    }
}
