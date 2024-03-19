<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Denuncia;
class showDashboardController extends Controller
{
    
    public function showDemand(Request $request)
    {
        $userId = auth()->user()->expedient;
        $denuncia = Denuncia::where('id', $userId);    
        return view('dashboard', ['denuncia' => $denuncia]);
    }

}
?>