<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Denuncia;
use Illuminate\Support\Facades\Http;


class SyncDataFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:data-from-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize data From External API';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $response = Http::get("http://127.0.0.1:8000/denunciaApi");
        //
        if ($response->successful()) {
            $dataFromApi = $response->json();

            foreach ($dataFromApi as $data) {
                // Buscar si ya existe una denuncia con el mismo identificador único
                $existingDenuncia = Denuncia::where('id', $data['id'])->first();
                
                if (!$existingDenuncia) {
                    Denuncia::create($data);
                } 
            }
        }
    }
}