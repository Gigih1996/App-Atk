<?php

namespace App\Http\Controllers;

use App\Models\DigitalArsip;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $user = User::count();
        // $sm = DigitalArsip::where('jenis_id', 7)->get()->count();
        // $sk = DigitalArsip::where('jenis_id', 8)->get()->count();
        // $aktif = DigitalArsip::where('status_id', 1)->get()->count();
        // $inaktif = DigitalArsip::where('status_id', 2)->get()->count();
        // $permanen = DigitalArsip::where('status_id', 3)->get()->count();
        return view('home');
    }
}
