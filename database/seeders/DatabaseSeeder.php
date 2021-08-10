<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admin')->insert([
            'adminID' => Str::uuid()->toString(),
            'adminName' => 'Andreas',
            'adminUsername' => 'admin',
            'adminEmail' => 'admin@huntstreet.com',
            'adminPassword' => 'admin',
            'adminPhone' => '087870172951',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
