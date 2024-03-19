<?php

namespace App\Observers;

use App\Models\Denuncia;
use App\Models\DenunciaSegundaDB;
class DenunciaObserver
{
    /**
     * Handle the Denuncia "created" event.
     */
    public function created(Denuncia $denuncia): void
    {
        //
    }

    /**
     * Handle the Denuncia "updated" event.
     */
    public function updated(Denuncia $denuncia): void
    {
        Denuncia::updateDenunciaInExternalApi($denuncia);
    }

    /**
     * Handle the Denuncia "deleted" event.
     */
    public function deleted(Denuncia $denuncia): void
    {
        Denuncia::destroy($denuncia);
    }

    /**
     * Handle the Denuncia "restored" event.
     */
    public function restored(Denuncia $denuncia): void
    {
        //
    }

    /**
     * Handle the Denuncia "force deleted" event.
     */
    public function forceDeleted(Denuncia $denuncia): void
    {
        //
    }
}
