<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Supplier::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $supplier = "'$row->id', '$row->name'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditAction(' . $supplier . ')" data-toggle="modal" data-target="#updateModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteAction(' . $supplier . ')"
                                data-toggle="modal" data-target="#DeleteSupplierModal">
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

        return view('supplier.index');
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
        $departement = Supplier::where(['name' => $request->name])->first();

        $departement = new Supplier();
        $departement->name = $request->name;
        $departement->save();

        // return Response()->json(['name' => true]);
        if ($departement) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $departement = Supplier::find($id);
        $departement->name = $request->name;
        $departement->save();

        if ($departement) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $departement = $request->id;
        Supplier::find($departement)->delete();
    }
}
