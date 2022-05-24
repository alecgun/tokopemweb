<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('user')) {
            $barangs = Barang::all();
            return view('home', compact('barangs'));
        } else {
            return redirect('/');
        } 
    }
}
