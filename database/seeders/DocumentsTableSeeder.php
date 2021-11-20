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
            'description' => 'L’immatriculation consulaire est une formalité administrative qui concerne les béninois résidant régulièrement dans un pays étranger. Elle constitue un préalable pour bénéficier de la protection consulaire et des différentes prestations fournies par les représentations consulaires.',
            'price' => 10000,
            'validity' => 5,
        ]);
    }
}
