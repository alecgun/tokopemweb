<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $barang = new Barang;
        $barang = Barang::create($request->all());
        // upload foto
        $image_name = '';
        if ($request->file('image')) 
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $image_name = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = $image_name.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads', $filenameSimpan);
        }
        
        $barang->image = $filenameSimpan;
        $barang->save();
        
        return redirect('dashboard');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('admin.edit',['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());
        if ($barang->image && file_exists(storage_path('app/public/'. $barang->image))) 
        {
            Storage::delete('public/'. $barang->image);
        }
        $image_name = '';
        if ($request->file('image')) 
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $image_name = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = $image_name.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads', $filenameSimpan);
        }
        $barang->image = $filenameSimpan;
        $barang->save();

        return redirect('dashboard');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete($barang);
        return redirect('dashboard');
    }
}
