<?php

use Illuminate\Database\Seeder;

class DataMatpelDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_matpel') -> insert([
            'kode_matpel' => '3',
            'nma_matpel' => 'VB.net',
            'status_aktif' => '1',
            'file_gambar' => 'matpel3.jpg',
            'deskripsi' => 'Belajar Visual Basic.net',
        ]);

    }
}
