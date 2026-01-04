<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama_user' => 'Rizkania Hartika Putri',
                'email' => 'rizka@gmail.com',
                'no_hp' => '087870122846',
                'password' => Hash::make('rizka123'),
                'peran' => 'admin',
                'foto_profil' => 'rizka.jpg',
                'alamat' => 'Pasawahan, Purwakarta',
            ],
            [
                'nama_user' => 'Julaika Safta Rini',
                'email' => 'jule@gmail.com',
                'no_hp' => '083132484576',
                'password' => Hash::make('jule123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'jule.jpg',
                'alamat' => 'Cihuni, Purwakarta',

            ],
            [
                'nama_user' => 'Angga Jaya',
                'email' => 'angga_jaya@gmail.com',
                'no_hp' => '083811223344',
                'password' => Hash::make('angga123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'angga_jaya.jpg',
                'alamat' => 'Munjul Jaya, Purwakarta',
            ],
            [
                'nama_user' => 'Roronoa Zoro',
                'email' => 'zoro@gmail.com',
                'no_hp' => '087810293847',
                'password' => Hash::make('zoro123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'roronoa-zoro.jpg',
                'alamat' => 'Tokyo, Jepang',
            ],
            [
                'nama_user' => 'Vinsmoke Sanji',
                'email' => 'sanji@gmail.com',
                'no_hp' => '083811223344',
                'password' => Hash::make('sanji123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'vinsmoke-sanji.jpg',
                'alamat' => 'Gg. Rusa, Sindangkasih',
            ],
            [
                'nama_user' => 'Nami',
                'email' => 'nami@gmail.com',
                'no_hp' => '087870112233',
                'password' => Hash::make('nami123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'nami.jpg',
                'alamat' => 'Kp. Jati, Pasawahan',
            ],

            [
                'nama_user' => 'Monkey D Luffy',
                'email' => 'luffy@gmail.com',
                'no_hp' => '083185892567',
                'password' => Hash::make('luffy123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'mokey-luffy.jpg',
                'alamat' => 'Cidahu, Purwakarta',
            ],
            [
                'nama_user' => 'Nico Robin',
                'email' => 'robin@gmail.com',
                'no_hp' => '08319634864',
                'password' => Hash::make('carmen123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'nico-robin.jpg',
                'alamat' => 'Kota Baru, Karawang',
            ],
            [
                'nama_user' => 'Mark Lee',
                'email' => 'mark@gmail.com',
                'no_hp' => '089676003743',
                'password' => Hash::make('mark123'),
                'peran' => 'admin',
                'foto_profil' => 'mark_dotdonat.jpg',
                'alamat' => 'Campaka, Purwakarta',
            ],
            [
                'nama_user' => 'Carmen Nita',
                'email' => 'carmen@gmail.com',
                'no_hp' => '087779102746',
                'password' => Hash::make('carmen123'),
                'peran' => 'pengunjung',
                'foto_profil' => 'carmen_drink.jpg',
                'alamat' => 'Denpasar, Bali',
            ],
        ];

        User::insert($users);
    }
}
