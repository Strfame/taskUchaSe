<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now= new DateTime;

        $insertData = [
            [
                'title' => 'Математика',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Български език',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Литература',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Химия',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Физика',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Биология',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'История',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'География',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'Програмиране',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];
        
        DB::table('subjects')->insert($insertData);
    }
}
