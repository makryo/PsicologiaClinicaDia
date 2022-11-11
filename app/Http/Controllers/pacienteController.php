<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\User;

class pacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('paciente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'medic_id' => 'required|max:15',
                'nombres' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'apellidos' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'telefono' => 'required|max:15',
                'mensajeria' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'edad' => 'required'
            ]
        );

        $medicid = $request->input('medic_id');
        $nom1 = $request->input('nombres');
        $apel1 = $request->input('apellidos');
        $tel = $request->input('telefono');
        $mensaje = $request->input('mensajeria');
        $edad = $request->input('edad'); 

        paciente::create([
            'user_id' => $medicid,
            'nombres' => $nom1,
            'apellidos' => $apel1,
            'telefono' => $tel,
            'mensajeria'=> $mensaje,
            'edad' => $edad
        ]);

        return redirect()->route('pacientes.create')->with('success', 'Registro exitoso');
        //return view('paciente.index')->with('success', 'Data was inserted');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paci = paciente::find($id);
        $paci2 = \App\Models\User::with(['pacientes'])->first();
        return view('paciente.show', compact('paci', 'paci2'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = paciente::findOrFail($id);
        return view('paciente.edit',compact('Edita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paci = paciente::find($id);

        $request->validate(
            [
                'medic_id' => 'required|max:15',
                'nombres' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'apellidos' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'telefono' => 'required|max:15',
                'mensajeria' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'edad' => 'required'
            ]
        );

        $medicid = $request->input('medic_id');
        $nom1 = $request->input('nombres');
        $apel1 = $request->input('apellidos');
        $tel = $request->input('telefono');
        $mensaje = $request->input('mensajeria');
        $edad = $request->input('edad'); 

        $paci -> update([
            'user_id' => $medicid,
            'nombres' => $nom1,
            'apellidos' => $apel1,
            'telefono' => $tel,
            'mensajeria'=> $mensaje,
            'edad' => $edad
        ]);

        return redirect()->route('pacientes.edit', $paci->id)->with('success', 'Actualizacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
