<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'title' => 'Carte Consulaire Biométrique',
            'key' => 'carte-consulaire',
            'description' => '',
            'price' => 10000,
            'validity' => 5,
        ]);
    }
}
