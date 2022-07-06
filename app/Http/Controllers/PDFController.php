<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $data = [
            // 'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('PDF.index', $data);
        return $pdf->download('index.pdf');
    }
}
