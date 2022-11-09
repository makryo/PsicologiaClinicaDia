<?php

namespace App\Http\Controllers;

use App\Models\NotaEvolutiva;
use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\Users;

class NotaEvolutivaController extends Controller
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
        return view('notaEvolutiva.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notaEvolutiva.create');
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
                'observacion' => 'required|max:100|regex:/^[\pL\s\-]+$/u'

            ]
        );
        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $obs = $request->input('observacion');


        NotaEvolutiva::create([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'observacion' => $obs
        ]);

        return redirect()->route('notasEvolutivas.create')->with('success', 'Data was inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = NotaEvolutiva::find($id);
        $nota1 = \App\Models\User::with(['pacientes'])->get();
        $nota2 = \App\Models\citas::with('paciente')->get();
        //$cita3 = \App\Models\User::with(['citas'])->first();
        return view('notaEvolutiva.show', compact('nota', 'nota1', 'nota2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = NotaEvolutiva::findOrFail($id);
        return view('notaEvolutiva.edit',compact('Edita'));
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
        $nota = NotaEvolutiva::find($id);

        $request->validate(
            [
                'paciente_id' => 'required|max:15',
                'user_id' => 'required|max:15',
                'observacion' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $obs = $request->input('observacion');

        $nota -> update([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'observacion' => $obs
        ]);

        return redirect()->route('notasEvolutivas.edit', $nota->id)->with('success', 'Data was inserted');
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
