<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\DenunciaSegundaDB;
use Illuminate\Support\Facades\App;

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

        return view('denuncia.index', compact('denuncias'))
            ->with('i', (request()->input('page', 1) - 1) * $denuncias->perPage());
    }


    //Funcion para actualizar locales
    public function setLocale($locale){
        app()->setLocale($locale);
        return redirect()->back();
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
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = $archivo->getClientOriginalName();
            $archivo->storeAs('public/archivos_denuncias', $nombreArchivo);
        }
        return redirect()->route('denuncia.show',$denuncia->id);
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
    public function edit($id)
    {
        $denuncia = Denuncia::find($id);

        return view('denuncia.edit', compact('denuncia'));
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
        request()->validate(Denuncia::$rules);

        $denuncia->update($request->all());

        return redirect()->route('denuncia.confirm');
    }
}
