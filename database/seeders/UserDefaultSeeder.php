<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserDefaultSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert($this->oneUser());
    }

    /**
     * @return array
     */
    private function oneUser(): array
    {
        return $date[] = [
            'name' => 'GB',
            'surname' => 'Wallet',
            'email' => 'test@test.ru',
            'password' => Hash::make(123),
            'balance' => 50000,
        ];
    }
}
