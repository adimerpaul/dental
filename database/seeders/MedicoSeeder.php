<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            ["turno"=>"Mañana","nombre"=>"juan mecanico","ci"=>"1558625","fechanac"=>'1985-05-22',"genero"=>"Femenino","especialidad"=>"estudiante","telefono"=>"748952","direccion"=>"linares y bolivar"],
            ["turno"=>"Tarde","nombre"=>"aadasda","ci"=>"4454555","fechanac"=>'1999-12-12',"genero"=>"Femenino","especialidad"=>"estudiante","telefono"=>"482626","direccion"=>"linares y bolivar"],
            ["turno"=>"Noche","nombre"=>"bruja de bler","ci"=>"4582645","fechanac"=>'1990-09-15',"genero"=>"Femenino","especialidad"=>"estudiante","telefono"=>"54852","direccion"=>"linares y bolivar"],
        ]);
    }
}
