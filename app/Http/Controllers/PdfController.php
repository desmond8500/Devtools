<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function description_diagram($id)
    {
        $projet = Projet::find($id);
        $data = [
            'projet' => $projet
        ];

        $pdf = \PDF::loadView('pdf.description_diagram', $data);
        // return $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');
    }
}
