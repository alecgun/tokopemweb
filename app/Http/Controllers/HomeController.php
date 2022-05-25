<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

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
        $barangs = Barang::all();
        if ($request->user()->hasRole('user')) {
            return redirect('home');
        }

        else if ($request->user()->hasRole('admin')){
            return redirect('dashboard');
        }

        else {
            return redirect('/');
        }
    }
}
