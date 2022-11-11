<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;
use App\Models\paciente;
use App\Models\Users;
use App\Models\entrevista;
use App\Models\receta;
use App\Models\NotaEvolutiva;
use PDF;

class PDFController extends Controller
{
    public function generarPDF($id){
        $cita = citas::find($id);
        $cita2 = \App\Models\User::with(['pacientes'])->get();
        $cita3 = \App\Models\citas::with('paciente')->get();
        //$cita3 = \App\Models\User::with(['citas'])->first();
        //return view('citas.show', compact('cita', 'cita2', 'cita3'));
        $pdf = PDF::loadView('pdfs.citas', compact('cita', 'cita2', 'cita3'));
        return $pdf->download('citaComprobante.pdf');
    }

    public function generarPDFPacientes(){

        $pdf = PDF::loadView('pdfs.pacientes');
        return $pdf->download('ReporteGeneral.pdf');
    }

    public function generarPDFEntrevista($id){
        $entre = entrevista::find($id);
        $entre1 = \App\Models\User::with(['pacientes'])->get();
        $entre2 = \App\Models\citas::with('paciente')->get();

        $pdf = PDF::loadView('pdfs.entrevista', compact('entre', 'entre1', 'entre2'));
        return $pdf->download('ReporteEntrevista.pdf');
    }

    public function generarPDFReceta($id){
        $rece = receta::find($id);
        $rece1 = \App\Models\User::with(['pacientes'])->get();
        $rece2 = \App\Models\citas::with('paciente')->get();

        $pdf = PDF::loadView('pdfs.recetas', compact('rece', 'rece1', 'rece2'));
        return $pdf->download('ReporteReceta.pdf');
    }

    public function generarPDFNota($id){
        $nota = NotaEvolutiva::find($id);
        $nota1 = \App\Models\User::with(['pacientes'])->get();
        $nota2 = \App\Models\citas::with('paciente')->get();

        $pdf = PDF::loadView('pdfs.notasEvolutivas', compact('nota', 'nota1', 'nota2'));
        return $pdf->download('ReporteNota.pdf');
    }
}
