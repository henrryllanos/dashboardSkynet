<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;
use Alert;

class AmbientesReservadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $ambientes = DB::table('solicitudes')
            ->join('materias', 'solicitudes.materia', '=', 'materias.id')
            ->join('ambientes', 'solicitudes.ambiente', '=', 'ambientes.id')
            ->where('solicitudes.docente')
            ->select('solicitudes.estado','ambientes.num_ambiente','materias.nombre','solicitudes.dia',
            'solicitudes.hora_ini','solicitudes.hora_fin')
            ->get();

            return view('admin.ambientesR.index', compact('ambientesR'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $newAmbiente= new Ambiente();

            $newAmbiente->codigo = $request->codigo;
            $newAmbiente->num_ambiente = $request->num_ambiente;
            $newAmbiente->capacidad = $request->capacidad;
            $newAmbiente->ubicacion = $request->ubicacion;
            $newAmbiente->estado = $request->estado;
            $newAmbiente->save();


            return redirect()->back();
    }

    public function delete(Request $request, $ambienteId)
    {
        function debug_to_console($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);

            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }

        $solicitudes = Solicitud::where('ambiente', $ambienteId)->first();

        $ambiente = Ambiente::find($ambienteId);
        debug_to_console($ambiente);
        debug_to_console($solicitudes);
        /**DB::table('solicitudes')->where('ambiente', '!=', $ambiente)->delete();
        if( $solicitudes["ambiente"] == $ambiente["id"] ){
        return back()->withErrors([
            'message' => 'El ambiente esta siendo usada en una reserva'
            ]);
            }else{
            /**$ambiente->delete();
            return redirect()->back();
            debug_to_console('hola');
        }
       */
        if(empty($solicitudes)){

            $ambiente->delete();
            return redirect()->back();
        }else{

            return back()->withErrors([
                'message' => 'No se puede eliminar el ambiente '.$ambiente["num_ambiente"].' debido a que esta siendo usada en una reservacion'
            ]);
        }


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambiente $ambiente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ambienteId)
    {
        $ambiente = Ambiente::find($ambienteId);
        $ambiente->num_ambiente = $request->num_ambiente;
        $ambiente->ubicacion = $request->ubicacion;
        $ambiente->capacidad = $request->capacidad;
        $ambiente->estado = $request->estado;
        $ambiente->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        //
    }
}
