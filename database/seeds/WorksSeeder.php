<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'author' => 'TestAuthor1',
                'name' => 'Васильев Андрей Петрович',
                'house' => 'Издательский дом "Салют"',
                'date' => '2020-06-17',
                'page' => '123',
                'image' => '',

            ],
            [
                'author' => '',
                'name' => 'Леонтрьев Аркадий Леонидович',
                'house' => 'Издательский дом "Вспышка"',
                'date' => '2020-06-15',
                'page' => '624',
                'image' => '',

            ],
            [
                'author' => '',
                'name' => 'Забайкальский Петр Валерьевич',
                'house' => 'Издательский дом "Глобус"',
                'date' => '2020-06-11',
                'page' => '452',
                'image' => '',

            ],
        ];
        DB::table('works')->insert($data);
    }
}
