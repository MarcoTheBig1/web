<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Marco Antonio',
            'apellido_paterno'=> 'Jiménez',
            'apellido_materno' =>'Tenorio',
            'telefono' => '7472576470',
            'email' => '57211000076@utrng.edu.mx',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

       // User::factory(99)->create();
    }
}
