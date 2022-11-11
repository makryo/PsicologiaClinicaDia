<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\paciente;
use App\Models\Users;

use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *ol
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('citas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.create');
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
                'paciente_id' => 'required|max:15',
                'user_id' => 'required|max:15',
                'fecha_cita' => 'required',
                'hora_cita' => 'required'
            ]
        );

        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $fechci = $request->input('fecha_cita');
        $horaci = $request->input('hora_cita');

        citas::create([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'fecha_cita' => $fechci,
            'hora_cita' => $horaci
        ]);

        return redirect()->route('citas.create')->with('success', 'Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = citas::find($id);
        $cita2 = \App\Models\User::with(['pacientes'])->get();
        $cita3 = \App\Models\citas::with('paciente')->get();
        //$cita3 = \App\Models\User::with(['citas'])->first();
        return view('citas.show', compact('cita', 'cita2', 'cita3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = citas::findOrFail($id);
        return view('citas.edit', compact('Edita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $citasa = citas::find($id);

        $request->validate(
            [
                'paciente_id' => 'required|max:15',
                'user_id' => 'required|max:15',
                'fecha_cita' => 'required',
                'hora_cita' => 'required'
            ]
        );

        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $fechci = $request->input('fecha_cita');
        $horaci = $request->input('hora_cita');

        $citasa->update([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'fecha_cita' => $fechci,
            'hora_cita' => $horaci
        ]);

        return redirect()->route('citas.edit', $citasa->id)->with('success', 'Actualizacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(citas $citas)
    {
        //
    }
}
