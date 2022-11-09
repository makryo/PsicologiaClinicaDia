<?php

namespace App\Http\Controllers;

use App\Models\receta;
use Illuminate\Http\Request;
use App\Models\paciente;
use App\Models\Users;

class RecetaController extends Controller
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
        return view('receta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receta.create');
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
                'medici_one' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_one' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_two' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_two' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_three' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_three' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_four' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_four' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_five' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_five' => 'required|max:100|regex:/^[\pL\s\-]+$/u'

            ]
        );
        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $medi1 = $request->input('medici_one');
        $indi1 = $request->input('indica_one');
        $medi2 = $request->input('medici_two');
        $indi2 = $request->input('indica_two');
        $medi3 = $request->input('medici_three');
        $indi3 = $request->input('indica_three');
        $medi4 = $request->input('medici_four');
        $indi4 = $request->input('indica_four');
        $medi5 = $request->input('medici_five');
        $indi5 = $request->input('indica_five');

        receta::create([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'medici_one' => $medi1,
            'indica_one' => $indi1,
            'medici_two' => $medi2,
            'indica_two'=> $indi2,
            'medici_three' => $medi3,
            'indica_three' => $indi3,
            'medici_four' => $medi4,
            'indica_four' => $indi4,
            'medici_five' => $medi5,
            'indica_five' => $indi5
        ]);

        return redirect()->route('recetas.create')->with('success', 'Data was inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rece = receta::find($id);
        $rece1 = \App\Models\User::with(['pacientes'])->get();
        $rece2 = \App\Models\citas::with('paciente')->get();
        //$cita3 = \App\Models\User::with(['citas'])->first();
        return view('receta.show', compact('rece', 'rece1', 'rece2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = receta::findOrFail($id);
        return view('receta.edit',compact('Edita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rece = receta::find($id);

        $request->validate(
            [
                'paciente_id' => 'required|max:15',
                'user_id' => 'required|max:15',
                'medici_one' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_one' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_two' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_two' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_three' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_three' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_four' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_four' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'medici_five' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
                'indica_five' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $paci = $request->input('paciente_id');
        $medicid = $request->input('user_id');
        $medi1 = $request->input('medici_one');
        $indi1 = $request->input('indica_one');
        $medi2 = $request->input('medici_two');
        $indi2 = $request->input('indica_two');
        $medi3 = $request->input('medici_three');
        $indi3 = $request->input('indica_three');
        $medi4 = $request->input('medici_four');
        $indi4 = $request->input('indica_four');
        $medi5 = $request->input('medici_five');
        $indi5 = $request->input('indica_five');

        $rece -> update([
            'paciente_id' => $paci,
            'user_id' => $medicid,
            'medici_one' => $medi1,
            'indica_one' => $indi1,
            'medici_two' => $medi2,
            'indica_two'=> $indi2,
            'medici_three' => $medi3,
            'indica_three' => $indi3,
            'medici_four' => $medi4,
            'indica_four' => $indi4,
            'medici_five' => $medi5,
            'indica_five' => $indi5
        ]);

        return redirect()->route('recetas.edit', $rece->id)->with('success', 'Data was inserted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(receta $receta)
    {
        //
    }
}
