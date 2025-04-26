<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nama_kelas' => 'XI-RPL1',
            'jurusan' => 'Rekayasa Perangkat Lunak',
        ];

        DB::table('table_kelas')->insert($data);

        $data = [
            'nama_kelas' => 'XI-RPL2',
            'jurusan' => 'Rekayasa Perangkat Lunak',
        ];

        DB::table('table_kelas')->insert($data);
    }
}
