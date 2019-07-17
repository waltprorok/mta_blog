<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id' => 1, 'title' => 'Post One', 'content' => 'Post one content', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'title' => 'Post Two', 'content' => 'Post two content', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 1, 'title' => 'Post Three', 'content' => 'Post three content', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
