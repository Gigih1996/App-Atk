<?php

namespace App\Http\Controllers;

use App\Models\reporting;
use App\Models\DigitalArsip;
use App\Models\JenisArsip;
use App\Models\Kabinet;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ReportingController extends Controller
{

    public static function getkabinet_nomor($id)
    {
        $row = Kabinet::find($id);
        return $row->nomor_kabinet;
    }

    public static function getrole_name($id)
    {
        $role = Role::find($id);
        return $role->name;
    }

    public static function getjenisname($id)
    {
        $jenis_arsip = JenisArsip::where('id', $id)->first();

        return $jenis_arsip->nama_jenis_arsip;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reporting = DigitalArsip::orderBy('id', 'ASC')->get();

        $kabinet_nomor = $this;
        $role_name = $this;
        $jenis_arsip = $this;

        return view('reporting.index', compact('reporting', 'kabinet_nomor', 'role_name', 'jenis_arsip'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reporting  $reporting
     * @return \Illuminate\Http\Response
     */
    public function show(reporting $reporting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reporting  $reporting
     * @return \Illuminate\Http\Response
     */
    public function edit(reporting $reporting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reporting  $reporting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reporting $reporting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reporting  $reporting
     * @return \Illuminate\Http\Response
     */
    public function destroy(reporting $reporting)
    {
        //
    }
}
