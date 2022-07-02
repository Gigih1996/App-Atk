<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");


use App\Models\Type;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Type::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $dateFormate = date('d-m-Y H:i:s', strtotime($row->created_at));
                    $type = "'$row->id', '$row->name', '$dateFormate'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditType(' . $type . ')" data-toggle="modal" data-target="#EditTypeModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteType(' . $type . ')"
                                data-toggle="modal" data-target="#DeleteTypeModal">
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

        return view('types.index');
    }

    public function create(Request $request)
    {
        $type = Type::where(['name' => $request->name])->first();
        if ($type) {
            return Response()->json(['status' => false]);
        } else {
            return Response()->json(['status' => true]);
        }
    }

    public function store(Request $request)
    {
        $type = Type::where(['name' => $request->name])->first();

        $type = new Type();
        $type->name = $request->name;
        $type->save();

        // return Response()->json(['name' => true]);
        if ($type) {
            return Response()->json(['name' => true]);
        }
    }


    public function show(Type $Unit)
    {
        //
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Type::find($id);
        return response()->json(['data' => $data]);
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $unit = Type::find($id);
        $unit->name = $request->name;
        $unit->save();

        if ($unit) {
            return Response()->json(['name' => true]);
        }
    }

    public function destroy(Request $request)
    {
        $unit = $request->id;
        Type::find($unit)->delete();
    }
}
