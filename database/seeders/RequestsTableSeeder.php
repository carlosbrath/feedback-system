<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('requests')->insert([
            [
                'request_by' => 1, // Assuming the user ID of the requester is 1
                'request_to' => 2, // Assuming the user ID of the requestee is 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data here if needed
        ]);
    }
}
