<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $tags = [
            [
                'name' => 'Important',
                'color' => '#00000',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Purple',
                'color' => '#7B64FF',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Work',
                'color' => '#00000',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Orange',
                'color' => '#E27300',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Yellow',
                'color' => '#FCC400',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Gray',
                'color' => '#808080',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Blue',
                'color' => '#009CE0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Home',
                'color' => '#00000',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Red',
                'color' => '#D33115',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Green',
                'color' => '#68BC00',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        DB::table('tags')->insert($tags);
    }
}
