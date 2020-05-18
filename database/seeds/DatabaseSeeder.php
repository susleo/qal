<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(\App\User::class,3)->create()
            ->each(function ($u){
               $u->questions()
               ->saveMany(
                   factory(\App\Question::class,rand(1,5))->make()
               )
                   ->each(function ($p){
                       $p->replies()
                       ->saveMany(
                           factory(\App\Reply::class,rand(1,5))->make()
                       )    ;
                   });
            });

        $users = \App\User::pluck('id')->all();
        $number = count($users);

        foreach (\App\Question::all() as $question){
            for ($i=0 ; $i<rand(1,$number);$i++){
                $user = $users[$i];
                $question->favourites()->attach($user);
            }

        }


    }
}
