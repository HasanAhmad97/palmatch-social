<?php

use Illuminate\Database\Seeder;

class UserHobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = \App\User::all();

        foreach ($users as $user) {

            $hobbies = \App\Hobby::inRandomOrder()->take(rand(1, 6))->get();
            foreach ($hobbies as $hobby) {
                $userHobby = new \App\UserHobby();
                $userHobby->user_id = $user->id;
                $userHobby->hobby_id = $hobby->id;
                $userHobby->save();
            }
        }
//        $hobbies = \App\Hobby::inRandomOrder()->take()->get();
    }
}
