<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'harun',
			'namalengkap' => 'harun',
			'alamat' => 'jln raya pacar kembang ,Surabya jawa timur',
			'notelp' => '081-080808-00',
			'nosim' => 'KL-00-00',
			'role'=>'member',
            'email' => 'harun@mail.com',
            'password' => bcrypt('semangat')
        ]);
    }
}
