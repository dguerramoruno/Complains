<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DenunciaSegundaDB;
use Illuminate\Support\Facades\Storage;
use App\Models\Status;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\StatusController;
/**
 * Class DenunciaController
 * @package App\Http\Controllers
 */
class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        $denuncias = Denuncia::paginate();
        $status = Status::All();
        return view('denuncia.index', compact('denuncias','status'))
            ->with('i', (request()->input('page', 1) - 1) * $denuncias->perPage());
    }
    public function downloadFile($archivoId){
        $urlAppB = 'http://localhost:8000';
        $urlDescargarArchivo = $urlAppB .'/storage/'. $archivoId;
        $response = Http::get($urlDescargarArchivo);

        if ($response->successful()) {
            return $response->body();
        } else {
            abort(404, 'Archivo no encontrado ');
        }
    }

    //FUNCION PARA FILTRAR POR ESTADO
    public function stateFilter(Request $request){
        $estado = $request->input('estado');
        $fechaInicio = $request->input('created_at');
        $fechaFin = $request->input('final_date');
        $denuncias = Denuncia::when($fechaInicio, function ($query) use ($fechaInicio,$fechaFin) {
                return $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
            })
            ->where('estado', $estado)
            ->paginate(10);
    
        if (!$denuncias->isEmpty()) {
            return view('denuncia.index', compact('denuncias'))
                ->with('i', (request()->input('page', 1) - 1) * $denuncias->perPage());
        }
    
        return view('denuncia.noResults', ['estado' => $estado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $denuncia = new Denuncia();
        return view('denuncia.create', compact('denuncia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Denuncia::$rules);

        $denuncia = Denuncia::create($request->all());

        return redirect()->route('denuncias.index')
            ->with('success', 'Denuncia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncia = Denuncia::find($id);

        return view('denuncia.show', compact('denuncia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $denuncia = Denuncia::find($id);
        $status = Status::getAllStatus();
        return view('denuncia.edit', compact('denuncia','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Denuncia $denuncia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncia $denuncia)
    {
        if ($denuncia->estado === 3 || $denuncia->estado === 4) {
            return redirect()->route('denuncias.index')->with('failed','Las denuncias cerradas no se pueden editar');
        }else{
        request()->validate(Denuncia::$rules);

        $denuncia->update($request->all());
        $denuncia->user_id = auth()->id() ?? null;;
        $denuncia->traspased=0;
        $denuncia->save();
        $this->updateDenunciaInExternalApi($denuncia);
        return redirect()->route('denuncias.index')
            ->with('success', 'Denuncia updated successfully');
        }
    }
    private function updateDenunciaInExternalApi(Denuncia $denuncia)
    {
        // Realizar la llamada a la API externa para actualizar la denuncia
        $denunciaArray = $denuncia->toArray();
        $denunciaArray['created_at'] = $denuncia->created_at->format('Y-m-d H:i:s');
        $denunciaArray['updated_at'] = $denuncia->updated_at->format('Y-m-d H:i:s');
        $denuncia->traspased = 1;
        $data = http_build_query($denunciaArray);
        $url = "http://127.0.0.1:8000/denunciaApi/{$denuncia->id}/?".$data;
        $response = Http::put($url);

        if (!$response->successful()) {
            \Log::error('Error al actualizar denuncia en la API externa', ['response' => $response->json()]);
        }
    }

    public function ownComplains()
    {
        $user = auth()->user();
        $denuncias = Denuncia::where('user_id', $user->id)->get();

        return view('denuncia.index', compact('denuncias'));
    }




    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Denuncia $denuncia)
    {
        // Realizar la llamada a la API externa para eliminar la denuncia
        $url = "http://127.0.0.1:8000/denunciaApi/{$denuncia->id}";
        $response = Http::delete($url);

        if ($response->successful()) {
            $denuncia->delete();

            return view('dashboard');
        } else {
            \Log::error('Error al eliminar denuncia en la API externa', ['response' => $response->json()]);
            return response()->json(['message' => 'Error al eliminar la denuncia en la API externa'], 500);
        }
    }
}
