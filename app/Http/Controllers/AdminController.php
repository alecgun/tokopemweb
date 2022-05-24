<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('admin')) {
            $barangs = Barang::all();
            return view('admin.index', compact('barangs'));
        } else {
            return redirect('/');
        } 
    }
}
