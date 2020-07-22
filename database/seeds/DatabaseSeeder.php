<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('AuthorSeeder');
        $this->call('PostSeeder');
        $this->call('CommentSeeder');
    }
}


// make route data author join post
