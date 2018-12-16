<?php

use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais = new \App\Pais();
        $pais->nombre = 'Perú';
        $pais->nacionalidad = 'Peruana';
        $pais->save();
    }
}
