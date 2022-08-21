<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Start inserting users');
        $user = User::factory(1)->create([
            'name' => "User",
            'email'=> 'user@app.com',
            'password' => bcrypt('password')
        ]);
        PersonalAccessToken::create([
            'tokenable_id' => $user[0]->id,
            'tokenable_type' => 'App\Models\User',
            'name' => 'User',
            'token' => '83e972e8b3f99fdf4c4334e33d9f5f67bd3c2d1a91a71c141fdb233fa2283ed6', // 1|RWAWmX5q5GJYcZcaCgbZPu2W7JI6QsTtS3iF739F
            'abilities' => '["*"]'
        ]);

        $this->command->info('users was inserted Successfully');
    }
}
