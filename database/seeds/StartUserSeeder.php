<?php

use Illuminate\Database\Seeder;

class StartUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'is_admin' => 1,
            'email' => 'qwe@asd.ru',
            'password' => '$2y$12$fpxqJW5tH9QbRtG4zgHeQeNera8n/oP9B9i0zranTbWjsoLv5DLTO'
        ]);

        DB::table('persons')->insert([
            'user_id' => 1,
            'surname' => 'Удалить',
            'name' => 'ОБЯЗАТЕЛЬНО!',
            'position' => 'Базовый админ'
        ]);
    }
}
