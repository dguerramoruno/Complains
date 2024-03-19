<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Denuncia;


class handlePriorityComplaint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:handle-priority-complaint';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for change Priority of Complaints';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $denuncias = Denuncia::where('created_at', '<=', now()->subDays(7))->where('estado', '!=', 'prioritario')->get();
        foreach ($denuncias as $denuncia) {
            // Cambiar el estado de la denuncia a prioritario
            $denuncia->update(['estado' => 'prioritario']);
        }

        $this->info('Estado de denuncias actualizado a prioritario.');
    }
}
