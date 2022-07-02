<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");


use App\Models\Departement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Departement::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $dateFormate = date('d-m-Y H:i:s', strtotime($row->created_at));
                    $departement = "'$row->id', '$row->name', '$dateFormate'";
                    $departementId = "'$row->id'";
                    $departementName = "'$row->name'";
                    // $departementedit = "'$row->id', '$row->name', '$dateFormate'";

                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditDepartement(' . $departement . ')" data-toggle="modal" data-target="#EditDepartementModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteDepartement(' . $departement . ')"
                                data-toggle="modal" data-target="#DeleteDepartementModal">
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

        return view('departements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $departement = Departement::where(['name' => $request->name])->first();
        if ($departement) {
            return Response()->json(['status' => false]);
        } else {
            return Response()->json(['status' => true]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departement = Departement::where(['name' => $request->name])->first();

        $departement = new Departement();
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
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Departement::find($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $departement = Departement::find($id);
        $departement->name = $request->name;
        $departement->save();

        if ($departement) {
            return Response()->json(['name' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $departement = $request->id;
        Departement::find($departement)->delete();
        // $data = [
        //     'status' => 'Delete Successfully',
        //     'status_text' => 'You student data has been deleted successfully',
        //     'status_icon' => 'success'
        // ];

        // return response()->json(['data' => $data]);
    }
}
