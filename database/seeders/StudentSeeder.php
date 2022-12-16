<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('students')->insert(
            [
                'name' => 'Javier',
                'telefono' => '123456789',
                'age'=>7,
                'password'=> 'contra123',
                'email' => 'javier@correo.com',
                'sexo' => 'masculino'
            ]);

            DB::table('students')->insert(
                [
                    'name' => 'Manuel',
                    'telefono' => '923456789',
                    'age'=>7,
                    'password'=> 'contra123',
                    'email' => 'Manuel@correo.com',
                    'sexo' => 'masculino'
                ]);

                DB::table('students')->insert(
                    [
                        'name' => 'Pedro',
                        'telefono' => '723856789',
                        'age'=>7,
                        'password'=> 'contra123',
                        'email' => 'Pedro@correo.com',
                        'sexo' => 'masculino'
                    ]);
    }
}
