<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
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
                'title' => 'Test_record1',
                'author' => 'Test_person1',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'title' => 'Test_record2',
                'author' => 'Test_person2',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'title' => 'Test_record3',
                'author' => 'Test_person3',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'title' => 'Test_record4',
                'author' => 'Test_person4',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'title' => 'Test_record5',
                'author' => 'Test_person5',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
        ];
        DB::table('news')->insert($data);
    }
}
