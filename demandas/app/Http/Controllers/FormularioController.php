<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use PhpOption\Some;

class FormularioController extends Controller
{
    public function showFirstPage()
    {
        $selectedTab = 'denuncia-form'; // Puedes obtener esto dinámicamente según tu lógica

        
        $denuncia = new Denuncia();
        return view('denuncia.create', compact('denuncia','selectedTab'));
    }

    public function procesFirstPage(Request $request)
    {
        $request->validate([
            'intern' => 'required',
            'type' => 'required',
		    'descripcio' => 'required',
		    'testigos' => 'required',
        ]);

        $denuncia = new Denuncia();
        $denuncia->intern = 0; 
        $denuncia->fill($request->except('archivo'));
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('archivos', 'public');
            $denuncia->archivo = $rutaArchivo;
        }
        $denuncia->save();
        session(['denuncia_id' => $denuncia->id]);
        return redirect()->route('denuncia.confirm');
    }

        
    public function showSecondPage()
    {
        
        $denunciaId = session('denuncia_id');
        if(!$denunciaId){
            return redirect()->back()->with('error','No hay denuncia registrada');
        }
        $selectedTab = 'denuncia-confirm';
        $denuncia = Denuncia::find($denunciaId);
        return view('denuncia.confirm', compact('denuncia','selectedTab'));
        
    }

    public function procesSecondPage(Request $request)
    {
        return redirect()->route('auth.confirm-password');
    }
}
?>