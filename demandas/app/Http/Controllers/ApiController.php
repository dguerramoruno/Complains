<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Denuncia;

class ApiController extends Controller
{
    public function index(){
        $denuncias = Denuncia::where('traspased',0)->get();
        foreach($denuncias as $denuncia){
            $denuncia->update(['traspased'=>1]);
        }
        return $denuncias;
    }
    public function store(Request $request){
        request()->validate(Denuncia::$rules);
        $denuncia = Denuncia::create($request->all());
        $denuncia->save();
         return $denuncia;
    }
    public function show($id){
        $denuncia = Denuncia::find($id);
        return $denuncia;
    }
    public function update(Request $request,Denuncia $denuncia){
        \Log::info('Solicitud de actualización recibida en la API externa', ['data' => $request->all()]);

        $request->validate(Denuncia::$rules);
        
        $denuncia = Denuncia::where('id',$request->id)->update($request->all());
        return $denuncia;
    }
    public function destroy(Request $request, $id)
    {
        try {
            Denuncia::where('id',$id)->delete();
        } catch (\Exception $e) {
            \Log::error('Error al eliminar denuncia', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error al eliminar denuncia'], 500);
        }
    }
}
