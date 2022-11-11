<?php

namespace App\Http\Controllers;

use App\Models\entrevista;
use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\Users;

class EntrevistaController extends Controller
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
        return view('entrevista.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrevista.create');
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
                'tiempo_libre' => 'required|max:100',
                'hace_solo' => 'required|max:100',
                'no_gusta' => 'required|max:100',
                'deportes' => 'required|max:100',
                'programas' => 'required|max:100',
                'felicidad' => 'required|max:100',
                'entristece' => 'required|max:100',
                'enojo' => 'required|max:100',
                'aspec_vida' => 'required|max:100',
                'habitos' => 'required|max:100'
            ]
        );
        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $libre = $request->input('tiempo_libre');
        $solo = $request->input('hace_solo');
        $nogusta = $request->input('no_gusta');
        $deport = $request->input('deportes');
        $progra = $request->input('programas'); 
        $feliz = $request->input('felicidad');
        $triste = $request->input('entristece');
        $enojo = $request->input('enojo');
        $aspec = $request->input('aspec_vida');
        $habit = $request->input('habitos');

        entrevista::create([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'tiempo_libre' => $libre,
            'hace_solo' => $solo,
            'no_gusta' => $nogusta,
            'deportes'=> $deport,
            'programas' => $progra,
            'felicidad' => $feliz,
            'entristece' => $triste,
            'enojo' => $enojo,
            'aspec_vida' => $aspec,
            'habitos' => $habit
        ]);

        return redirect()->route('entrevistas.create')->with('success', 'Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entrevista  $entrevista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entre = entrevista::find($id);
        $entre1 = \App\Models\User::with(['pacientes'])->get();
        $entre2 = \App\Models\citas::with('paciente')->get();
        //$cita3 = \App\Models\User::with(['citas'])->first();
        return view('entrevista.show', compact('entre', 'entre1', 'entre2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entrevista  $entrevista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = entrevista::findOrFail($id);
        return view('entrevista.edit',compact('Edita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entrevista  $entrevista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entre = entrevista::find($id);

        $request->validate(
            [
                'paciente_id' => 'required|max:15',
                'user_id' => 'required|max:15',
                'tiempo_libre' => 'required|max:100',
                'hace_solo' => 'required|max:100',
                'no_gusta' => 'required|max:100',
                'deportes' => 'required|max:100',
                'programas' => 'required|max:100',
                'felicidad' => 'required|max:100',
                'entristece' => 'required|max:100',
                'enojo' => 'required|max:100',
                'aspec_vida' => 'required|max:100',
                'habitos' => 'required|max:100'
            ]
        );

        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $libre = $request->input('tiempo_libre');
        $solo = $request->input('hace_solo');
        $nogusta = $request->input('no_gusta');
        $deport = $request->input('deportes');
        $progra = $request->input('programas'); 
        $feliz = $request->input('felicidad');
        $triste = $request->input('entristece');
        $enojo = $request->input('enojo');
        $aspec = $request->input('aspec_vida');
        $habit = $request->input('habitos');

        $entre -> update([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'tiempo_libre' => $libre,
            'hace_solo' => $solo,
            'no_gusta' => $nogusta,
            'deportes'=> $deport,
            'programas' => $progra,
            'felicidad' => $feliz,
            'entristece' => $triste,
            'enojo' => $enojo,
            'aspec_vida' => $aspec,
            'habitos' => $habit
        ]);

        return redirect()->route('entrevistas.edit', $entre->id)->with('success', 'Actualizacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrevista  $entrevista
     * @return \Illuminate\Http\Response
     */
    public function destroy(entrevista $entrevista)
    {
        //
    }
}
