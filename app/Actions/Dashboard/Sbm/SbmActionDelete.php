<?php
namespace App\Actions\Dashboard\Sbm;

class SbmActionDelete
{
   public function execute($sbm)
   {
        $sbm->delete();
        return $sbm;
   }
}
