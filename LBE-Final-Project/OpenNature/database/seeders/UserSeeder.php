<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'user-id' => '1',
                'user-name' => 'Developer-Mode',
                'user-password' => 'admin9595',
                'user-email' => 'devmode@gmail.com',
            ],
        ];
        \DB::beginTransaction();
        try {
            foreach ($userData as $data) {
                User::create($data);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
