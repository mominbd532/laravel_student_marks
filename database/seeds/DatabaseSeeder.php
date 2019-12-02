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
        // $this->call(UsersTableSeeder::class);

        factory('App\Student',40)->create();

        $subjects =['Bangla','English','Math'];

        foreach ($subjects as $subject) {
            \App\Subject::create(['subName' => $subject]);
        }
    }
}
