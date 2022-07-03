<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\Employee;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class TransactionoutcomingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::select('*')->where('type', 'Out')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionData = "'$row->id',
                                    '$row->employee_id',
                                    '$row->product_id',
                                    '$row->unit_id',
                                    '$row->supplier_id',
                                    '$row->total',
                                    '$row->date'
                                ";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditAction(' . $actionData . ')"
                                data-toggle="modal" data-target="#updateModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteAction(' . $actionData . ')"
                                data-toggle="modal" data-target="#DeleteModal">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        if (session(key: 'success_message')) {
            Alert::success('Success!', session(key: 'success_message'));
        }
        $optionUnit = Unit::all();
        $optionEmployee = Employee::all();
        $optionProduct = Product::all();
        $optionSupplier = Supplier::all();

        return view('transactionoutcoming.index', compact('optionUnit', 'optionEmployee', 'optionProduct', 'optionSupplier'));
    }
}
