<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masyarakat = [
            [
                'nik' => '123456',
                'nama' => 'kamu',
                'username' => 'kamu',
                'telepon' => '465461135',
                'password' => bcrypt ('123456789'),
            ]
            ];
            masyarakatsDB::insert($masyarakat);
    }
}
