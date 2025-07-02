<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_types')->insert([
            [
                'name' => 'Občanský průkaz',
                'code' => 'OP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cestovní pas',
                'code' => 'PAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
