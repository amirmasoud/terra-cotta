<?php

use App\Icon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $categories = [
            [
                'name' => 'Servers',
                'icon_id' => Icon::whereClass('server')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Databases',
                'icon_id' => Icon::whereClass('database')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Logins',
                'icon_id' => Icon::whereClass('user-circle')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Notes',
                'icon_id' => Icon::whereClass('sticky-note')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Credit Cards',
                'icon_id' => Icon::whereClass('credit-card')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Identities',
                'icon_id' => Icon::whereClass('id-card')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Emails',
                'icon_id' => Icon::whereClass('envelope-open')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Wireless',
                'icon_id' => Icon::whereClass('signal')->first()->id,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
