<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreDocenteRequest;
//use App\Http\Requests\UpdateDocenteRequest;
use Illuminate\Http\Request;

use App\Models\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){

            $docentes = Docente::where('nome_docente','LIKE',"%{$request->busca}%")
            ->orWhere('sobrenome_docente','LIKE',"%{$request->busca}%")
            ->orderBy('nome_docente')->paginate(10);
        } else if(isset($request->busca)) {
            $docentes = Docente::where('nome_docente','LIKE',"%{$request->busca}%")
            ->orWhere('sobrenome_docente','LIKE',"%{$request->busca}%")
            ->orderBy('nome_docente')->paginate(10);
        } else {
            $docentes = Docente::orderBy('nome_docente')->paginate(10);
        }
        
        return view('docentes.index')->with('docentes',$docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create', [
            'docente' => new Docente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreDocenteRequest $request)
    public function store(Request $request)
    {
        $docente = new Docente;
        $docente->nome_docente = $request->nome_docente;
        $docente->sobrenome_docente = $request->sobrenome_docente;
        $docente->status = $request->status;
        $docente->id_departamento = $request->id_departamento;
        $docente->save();
        return redirect("/docentes/{$docente->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('docentes.show',[
            'docente' => $docente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return view('docentes.edit',[
            'docente' => $docente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocenteRequest  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateDocenteRequest $request, Docente $docente)
    public function update(Request $request, Docente $docente)
    {
        $docente->nome_docente = $request->nome_docente;
        $docente->sobrenome_docente = $request->sobrenome_docente;
        $docente->status = $request->status;
        $docente->id_departamento = $request->id_departamento;
        $docente->save();
        return redirect("/docentes/{$docente->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect('/docentes');
    }
}
