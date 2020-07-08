<?php

use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
        'new_header' => 'История кафедры',
        'new_content' => 'Страница истории кафедры. Будет дополнено',
        ]);
    }
}
