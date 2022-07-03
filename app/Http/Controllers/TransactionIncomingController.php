<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TransactionIncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::select('transactions.id as id','employee_id','transactions.unit_id as unit_id','total','date','supplier_id','product_id',
                                'employees.name as employee',                                
                                'products.name as product',                                
                                'units.name as unit',                             
                                'suppliers.name as supplier',                             
                                )
                    ->where('type','In')
                    ->join('employees','employees.id','=','employee_id')
                    ->join('products','products.id','=','product_id')
                    ->join('units','units.id','=','transactions.unit_id')
                    ->join('suppliers','suppliers.id','=','supplier_id')
                    ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('newDate', function ($row) {
                    $date = date('d F Y',strtotime($row->date));
                    return $date;

                    // return $row->date;
                })
                ->addColumn('action', function ($row) {
                    $actionData = "'$row->id','$row->supplier_id','$row->employee_id','$row->product_id','$row->unit_id','$row->total','$row->date'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditAction(' . $actionData . ')" data-toggle="modal" data-target="#updateModal">
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
                ->rawColumns(['action','newDate'])
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

        return view('transactionincoming.index',compact('optionUnit','optionEmployee','optionProduct','optionSupplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karyawan = Employee::find($request->employee_id);

        $transaction = new Transaction();
        $transaction->employee_id = $request->employee_id;
        $transaction->product_id = $request->product_id;
        $transaction->unit_id = $request->unit_id;
        $transaction->total = $request->total;
        $transaction->date = $request->date;
        $transaction->departement_id = $karyawan->departement_id;
        $transaction->type = 'In';
        $transaction->supplier_id = $request->supplier_id;
        $transaction->save();

        $transaction->updateStok(['product_id'=>$request->product_id,'type'=>'In','total'=>$request->total]);

        if ($transaction) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $karyawan = Employee::find($request->employee_id);

        $id = $request->id;
        $transaction = Transaction::find($id);
        $selisihSstok = $transaction->total-$request->total;

        $transaction->employee_id = $request->employee_id;
        $transaction->product_id = $request->product_id;
        $transaction->unit_id = $request->unit_id;
        $transaction->total = $request->total;
        $transaction->date = $request->date;
        $transaction->departement_id = $karyawan->departement_id;
        $transaction->supplier_id = $request->supplier_id;
        if($transaction->save()){
            $transaction->updateStok(['product_id'=>$request->product_id,'type'=>'Out','total'=>$selisihSstok]);
        };

        if ($transaction) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::find($id);
        $transaction->updateStok(['product_id'=>$transaction->product_id,'type'=>'Out','total'=>$transaction->total]);


        $transaction->delete();
    }
}
