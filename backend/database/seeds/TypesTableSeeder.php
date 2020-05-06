<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $types = [
            [
                'name' => 'text',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'textarea',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'password',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        DB::table('types')->insert($types);
    }
}
