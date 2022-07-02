<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Kabinet;
use App\Models\Role;
use DB;

class KabinetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => 'index', 'store']);
        $this->middleware('permission:user-create', ['only' => 'create', 'store']);
        $this->middleware('permission:user-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:user-delete', ['only' => 'destroy']);
    }

    public static function getrolename($id)
    {
        $role = Role::where('id', $id)->first();

        return $role->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabinets = Kabinet::orderBy('id', 'ASC')->get();
        $role_name = $this;

        if (session(key: 'success_message')) {
            Alert::success('Success!', session(key: 'success_message'));
        }


        return view('kabinet.index', compact('kabinets', 'role_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $kabinets = Kabinet::all();

        return view("kabinet.create", compact("kabinets", "roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_kabinet' => 'required|min:2|max:2',
            'roles_id' => 'required',
            'nama_kabinet' => 'required|unique:kabinets,nama_kabinet',
            'uraian' => 'required',
        ]);

        Kabinet::create([
            'nomor_kabinet' => $request->nomor_kabinet,
            'roles_id' => $request->roles_id,
            'nama_kabinet' => $request->nama_kabinet,
            'uraian' => $request->uraian,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('kabinet.index')->with('toast_success', 'The Kabinet has been create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kabinet  $kabinet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabinets = Kabinet::find($id);
        $roles = Role::all();
        $role_name = $this;
        // dd($kabinets);
        return view("kabinet.show", compact("kabinets", "roles", "role_name"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kabinet  $kabinet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kabinet = Kabinet::find($id);
        $roles  = Role::all();

        return view('kabinet.edit', compact('kabinet', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kabinet  $kabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabinet $kabinet)
    {
        $this->validate($request, [
            'nomor_kabinet' => 'required|min:2|max:3',
            'roles_id' => 'required',
            'nama_kabinet' => 'required',
            'uraian' => 'required',
        ]);

        //CARA PERTAMA
        // $kabinet->nomor_kabinet = $request->nomor_kabinet;
        // $kabinet->grup_user = $request->grup_user;
        // $kabinet->nama_kabinet = $request->nama_kabinet;
        // $kabinet->uraian = $request->uraian;
        // $kabinet->keterangan = $request->keterangan;
        // $kabinet->save();

        //CARA KEDUA
        Kabinet::where('id', $kabinet->id)
            ->update([
                'nomor_kabinet' => $request->nomor_kabinet,
                'roles_id' => $request->roles_id,
                'nama_kabinet' => $request->nama_kabinet,
                'uraian' => $request->uraian,
                'keterangan' => $request->keterangan,
            ]);

        return redirect()->route('kabinet.index')->with('toast_success', 'The Kabinet has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kabinet  $kabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('kabinets')->where('id', $id)->delete();
        return redirect()->route('kabinet.index')->with('success', 'The Kabinet has been destory successfully.');
    }
}
