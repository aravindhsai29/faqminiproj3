<?php

use App\Answer;
use App\User;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::inRandomOrder();
        for ($i = 1; $i <= 6; $i++) {
            $users->each(function ($user) {
                $answer = App\Answer::inRandomOrder()->first();
                $note = factory(\App\Note::class)->make();
                $note->user()->associate($user);
                $note->answer()->associate($answer);
                $note->save();
            });
        }
    }
}
