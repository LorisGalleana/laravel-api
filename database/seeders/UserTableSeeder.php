<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


use function Laravel\Prompts\password;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Ugo', 'email' => 'ugo@ugo.it', 'password' => Hash::make('321321321')],
            ['name' => 'Pino', 'email' => 'pino@pino.it', 'password' => Hash::make('321321321')],
            ['name' => 'Gino', 'email' => 'gino@gino.it', 'password' => Hash::make('321321321')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
