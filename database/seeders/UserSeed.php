<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Nombre',
            'email' => 'email@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'apellidos' => 'x',
            'telefono' => '123456789',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
