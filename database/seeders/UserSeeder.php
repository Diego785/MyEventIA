<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Diego Hurtado Vargas',
            'email' => 'Diego@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Mario Martinez Miranda',
            'email' => 'Mario@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Luis Carlos Vargas Contreras',
            'email' => 'Luis@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Miguel Barba Durán',
            'email' => 'Miguel@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'José Carlos Ballivián Martínez',
            'email' => 'Jose@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        
        User::create([
            'name' => 'Angélica Hurtado Zabala',
            'email' => 'Angelica@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Carol Zambrana Sans',
            'email' => 'Carol@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Sofia Escalante Gutiérrez',
            'email' => 'Sofia@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Luis Soliz Escalante',
            'email' => 'LuisSE@gmail.com',
            'password' => bcrypt('12345678')
        ]);



        User::create([
            'name' => 'Carlos Adrán Jimenez',
            'email' => 'Carlos@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Josefina del Mar Carrasco',
            'email' => 'Josefina@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Esthefania Miranda Saucedo',
            'email' => 'Esthefy@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Martin Peredo Rojas',
            'email' => 'Martin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Oscar Zambrano Sanjines',
            'email' => 'Oscar@gmail.com',
            'password' => bcrypt('12345678')
        ]);


        

    }
}
