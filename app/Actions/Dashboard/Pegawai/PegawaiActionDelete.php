<?php
namespace App\Actions\Dashboard\Pegawai;

class PegawaiActionDelete {
    public function execute($pegawai)
    {
        
        $pegawai->delete();
    }
}
