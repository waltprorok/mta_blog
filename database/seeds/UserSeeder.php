<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Walter Prorok',
            'email' => 'waltprorok@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('123456'),
            'admin' => 2,
            'author' => 1,
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
