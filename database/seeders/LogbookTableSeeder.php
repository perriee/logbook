<?php

namespace Database\Seeders;

use App\Models\Logbook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogbookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Logbook::create([
        'description' => 'Ini adalah isi dari logbook, ni adalah isi dari logbook,ni adalah isi dari logbook,ni adalah isi dari logbook,ni adalah isi dari logbook,ni adalah isi dari logbook,ni adalah isi dari logbook,',
       ]);
    }
}
