<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ethnics')->insert([
            ['name' => 'Adja'],
            ['name' => 'Bariba'],
            ['name' => 'Goun'],
            ['name' => 'Nago'],
            ['name' => 'Fulfudé'],
            ['name' => 'Aïzo'],
            ['name' => 'Mahi'],
            ['name' => 'Sahouè'],
            ['name' => 'Ouémé'],
            ['name' => 'Tori'],
            ['name' => 'Dendi'],
            ['name' => 'Yoa/Yom/Pila-Pila'],
            ['name' => 'Yoruba'],
            ['name' => 'Idasha'],
            ['name' => 'Berba'],
            ['name' => 'Kotafon'],
            ['name' => 'Xwla-Pla'],
            ['name' => 'Gando'],
            ['name' => 'Holli-dié'],
            ['name' => 'Ditamari (Besorabé)'],
            ['name' => 'Toffin'],
            ['name' => 'Dompago/Lokpa'],
            ['name' => 'Mina'],
            ['name' => 'Waama'],
            ['name' => 'Natimba'],
            ['name' => 'Boo'],
            ['name' => 'Pedah'],
            ['name' => 'Otamari'],
            ['name' => 'Gourmantché'],
            ['name' => 'Ouatchi'],
            ['name' => 'Ifé/Itcha'],
            ['name' => 'Mokolé'],
            ['name' => 'Ani'],
            ['name' => 'Sèto'],
            ['name' => 'Koto-Koli'],
            ['name' => 'Yendé'],
            ['name' => 'Windjii/Foodo'],
            ['name' => 'Kabyé'],
            ['name' => 'Gaganba'],
            ['name' => 'Djerma'],
            ['name' => 'Défi'],
            ['name' => 'Boko'],
            ['name' => 'Taneka/Tamba'],
            ['name' => 'Tchabè'],
            ['name' => 'Soruba/Biyobè'],
            ['name' => 'Hossori'],
        ]);
    }
}
