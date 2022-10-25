<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;
use App\Models\paciente;
use App\Models\Users;
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
}
