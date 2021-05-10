<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('students')->insert([
            'student_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'birthday' => Carbon::parse('2000-01-01'),
            'email' => Str::random(10).'@gmail.com',
            'email' => Str::random(10).'@gmail.com',
            'email' => Str::random(10).'@gmail.com',
            'email' => Str::random(10).'@gmail.com',    
            'password' => Hash::make('password'),
        ]);
    }
}
