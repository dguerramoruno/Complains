<?php

namespace App\Console\Commands;

use App\Http\Controllers\DenunciaController;
use Illuminate\Console\Command;
use App\Models\Denuncia;
use App\Services\ApiService;
class TraspaseDenunciaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'denuncia:traspase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Traspasa los datos de las denuncias a la API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $denuncias = Denuncia::where('traspased', 0)->get();

        foreach($denuncias as $denuncia){
            $this->updateDenunciaInExternalApi($denuncia);
            $denuncia->update(['traspased' => 1]);
        }
    }
}
