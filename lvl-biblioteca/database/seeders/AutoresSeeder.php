<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autors')->insert([
            'nombre_autor' => 'Miguel de Cervantes',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Agatha Chistie',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Charles Dickens',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Federico García Lorca',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Gabriel García Márquez',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Ernest Hemingway',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Víctor Hugo',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'James Joyce',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Franz Kafka',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'Félix Lope de Vega',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('autors')->insert([
            'nombre_autor' => 'William Shakespeare',
            'fecha_nacimiento' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
