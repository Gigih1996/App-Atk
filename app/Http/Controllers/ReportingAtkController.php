<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ReportingAtkController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(5);

        return view('PDF.index', compact('users'));
    }

    public function createPDF()
    {

        // $projects = User::all();

        // view()->share('projects', $projects);

        // $pdf = PDF::loadView('PDF.pdf', $projects);
        // return $pdf->download('export.pdf');
        // if ($request->has('download')) {
        //     PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
        //     $pdf = PDF::loadView('PDF.pdf');
        //     return $pdf->download('PDF.pdf');
        // }

        $users = User::all();

        $data = ['users' => $users];

        $pdf = PDF::loadView('PDF.pdf', $data);
        return $pdf->download('invoice.pdf');
        // return view('PDF.index', compact('users'));
    }
}
