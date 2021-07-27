<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tratamientos')->insert([
            ["nombre"=>"Odontologia preventiva","precio"=>"100"],
            ["nombre"=>"Obturacionez (Luz alogena)","precio"=>"100"],
            ["nombre"=>"Blanqueamiento dental","precio"=>"100"],

        ]);
    }
}
