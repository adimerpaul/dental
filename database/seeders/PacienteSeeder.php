<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            ["nombre"=>"juan mecanico","cinit"=>"1558625","fechanac"=>'1985-05-22',"genero"=>"Femenino","ocupacion"=>"estudiante","telefono"=>"748952","direccion"=>"linares y bolivar"],
            ["nombre"=>"aadasda","cinit"=>"4454555","fechanac"=>'1999-12-12',"genero"=>"Femenino","ocupacion"=>"estudiante","telefono"=>"482626","direccion"=>"linares y bolivar"],
            ["nombre"=>"bruja de bler","cinit"=>"4582645","fechanac"=>'1990-09-15',"genero"=>"Femenino","ocupacion"=>"estudiante","telefono"=>"54852","direccion"=>"linares y bolivar"],
        ]);
    }
}
