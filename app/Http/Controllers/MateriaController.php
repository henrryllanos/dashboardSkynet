<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('materia_index'), 403);
        $materias = Materia::orderBy('id', 'asc')->get();
        return view('admin.materias.index', compact('materias'))->with('tipo', "all");
    }

    public function UpdateStatusNoti(Request $request){
        abort_if(Gate::denies('materia_estado'), 403);
        $NotiUpdate = Materia::find($request->id);/* ->update(['estatus' => $request->estatus]) */
        $NotiUpdate ->estado=$request->estatus;

        $NotiUpdate->save();
        if($NotiUpdate){
            $NotiUpdate=Materia::find($request->id);
            if($NotiUpdate->estado == 'Deshabilitado')  {
                        $newStatus = '<span class="badge badge-danger">'.@$NotiUpdate->estado.'</span>';
                    }else{
                        $newStatus ='<span class="badge badge-success">'.@$NotiUpdate->estado.'</span>';
                    }
                    return response()->json(['var'=>''.$newStatus.'']);
        }

        return response()->json([],401);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('materia_create'), 403);
        $materias = Materia::all()->pluck('nombre', 'id');
        $carreras = Materia::all();

        return view('admin.materias.create', compact('materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validar la entrada
        abort_if(Gate::denies('materia_create'), 403);
        $request->validate([
            'codigo' => 'required|integer|max:9999999',
            'nombre' => 'required|string|max:255|unique:materias,nombre',
            'carrera' => 'required',
            'tipo' => 'required',
        ]);


        $newMateria = new Materia();

        $newMateria ->codigo = $request->codigo;
        $newMateria->nombre = $request->nombre;
        $newMateria->carrera = $request->carrera;
        $newMateria->tipo = $request->tipo;
        $newMateria->estado = $request->estado;
        // $newMateria->save();

        // $materias = Materia::where('codigo', $request->codigo)->first();
        $materias2 = Materia::where('nombre', $request->nombre)->first();
        //    dd($request->all());
        //    dd($materias2);
        if(empty($materias) && empty($materias2) ){
            $newMateria->save();
            return redirect()->back()->with('success','!Materia registrado Exitosamente!');
        }else{

            return redirect()->back()->with('success','!Ya existe el ambiente registrado!');
        }

            return redirect()->route('admin.materias.index', $materias2->id)->with('success', 'Materia creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function editar(Materia $materia)
    {
        abort_if(Gate::denies('materia_edit'), 403);
        $materias = Materia::orderBy('id', 'asc')->get();
        return view('admin.materias.editar', compact('materias'))->with('tipo', "all");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materiaId)
    {
        abort_if(Gate::denies('materia_edit'), 403);
        $materia = Materia::find($materiaId);

        $materia->nombre = $request->nombre;
        $materia->carrera = $request->carrera;
        $materia->tipo = $request->tipo;
        //$materia->estado = $request->estado;
        $materia->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
