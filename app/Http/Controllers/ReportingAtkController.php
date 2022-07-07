<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ReportingAtkController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::latest()->paginate(5);

        // return view('PDF.index', compact('users'));

        if ($request->ajax()) {
            $data = DB::select(
                'SELECT p.`name` as products, d.`name` as departement, SUM(total) AS total_sum,0 AS persen, p.id AS product_id
                FROM `transactions` t
                JOIN atk.`products` p ON p.`id` = t.`product_id`
                JOIN atk.`departements` d ON d.`id` = t.`departement_id`
                GROUP BY d.`id`, p.`id`'
            );
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('persen', function ($row) {
                    // $sql = Transaction::where(['type' => 'out', 'product_id', $row->product_id])->get();
                    $sql = DB::table('transactions')->select('*')->where(['type' => 'out', 'product_id', $row->product_id])->get();
                    $sumTotal = (int)$row->total_sum * $sql;
                    return $sumTotal;
                })
                ->rawColumns(['persen'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('PDF.index');
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
    }
}
