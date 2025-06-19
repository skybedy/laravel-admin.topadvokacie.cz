<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BooksOnSignatureAuthenticityDeclarationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('books_on_signature_authenticity_declarations')->insert([
                'customer_id' => rand(1, 50),
                'signature_created_date' => Carbon::create(2024, 1, 1)->addDays(rand(0, 364)),
            ]);
        }
    }
}
