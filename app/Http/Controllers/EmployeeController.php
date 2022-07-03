<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Employee::leftjoin('departements', 'employees.divisi_id', '=', 'departements.id')
                ->select(['employees.*', 'departements.name AS divisi_name'])
                ->orderBy('id', 'DESC')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $dateFormate = date('d-m-Y H:i:s', strtotime($row->created_at));
                    $divisiName = $row->divisi->name;
                    $employee = "'$row->id', '$row->name', '$row->divisi_id', '$dateFormate', '$divisiName'";
                    $btn = '
                            <button class="btn btn-primary btn-sm" onclick="EditEmployee(' . $employee . ')" data-toggle="modal" data-target="#EditEmployeeModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        ';

                    $btn .= '
                            <button class="btn btn-danger btn-sm" onclick="DeleteEmployee(' . $employee . ')"
                                data-toggle="modal" data-target="#DeleteEmployeeModal">
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

        $divisi = Departement::all();

        return view('employees.index', compact('divisi'));
    }

    public function create(Request $request)
    {
        // $employee = Employee::where(['name' => $request->name])->first();
        // if ($employee) {
        //     return Response()->json(['status' => false]);
        // } else {
        //     return Response()->json(['status' => true]);
        // }

        $employee = new Employee;
        $employee->kode_pengguna = $request->id;
        $employee->name = $request->name;
        $employee->divisi_id = $request->divisi_id;
        $employee->save();

        return Response()->json($employee);
    }

    public function store(Request $request)
    {
        $employee = Employee::where(['name' => $request->name])->first();

        if ($employee) {
            return Response()->json(['status' => false]);
        } else {

            $employee = new Employee();
            $employee->id = $employee->generateNomor();
            $employee->name = $request->name;
            $employee->divisi_id = $request->divisi_id;
            $employee->save();

            return Response()->json(['status' => true]);
        }

        // return Response()->json(['name' => true]);
        // if ($employee) {
        //     return Response()->json(['name' => true]);
        // }
    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Employee::find($id);
        return response()->json(['data' => $data]);
    }


    public function update(Request $request)
    {
        $id = $request->id_employee;
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->divisi_id = $request->divisi_id;
        $employee->save();

        if ($employee) {
            return Response()->json(['name' => true]);
        }
    }

    public function destroy(Request $request)
    {
        $employee = $request->id;
        Employee::find($employee)->delete();
    }
}
