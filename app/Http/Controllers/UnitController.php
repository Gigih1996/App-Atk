<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Unit::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $dateFormate = date('d-m-Y H:i:s', strtotime($row->created_at));
                    $unit = "'$row->id', '$row->name', '$dateFormate'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditUnit(' . $unit . ')" data-toggle="modal" data-target="#EditUnitModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteUnit(' . $unit . ')"
                                data-toggle="modal" data-target="#DeleteUnitModal">
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

        return view('units.index');
    }

    public function create(Request $request)
    {
        $Unit = Unit::where(['name' => $request->name])->first();
        if ($Unit) {
            return Response()->json(['status' => false]);
        } else {
            return Response()->json(['status' => true]);
        }
    }

    public function store(Request $request)
    {
        $Unit = Unit::where(['name' => $request->name])->first();

        $Unit = new Unit();
        $Unit->name = $request->name;
        $Unit->save();

        // return Response()->json(['name' => true]);
        if ($Unit) {
            return Response()->json(['name' => true]);
        }
    }


    public function show(Unit $Unit)
    {
        //
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Unit::find($id);
        return response()->json(['data' => $data]);
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->save();

        if ($unit) {
            return Response()->json(['name' => true]);
        }
    }

    public function destroy(Request $request)
    {
        $unit = $request->id;
        Unit::find($unit)->delete();
    }
}
