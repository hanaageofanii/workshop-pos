<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('admin.sparepart.index', compact('spareparts'));
    }

    public function create()
    {
        return view('admin.sparepart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Sparepart::create($request->all());

        return redirect('/admin/sparepart')->with('success', 'Sparepart ditambahkan');
    }

    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('admin.sparepart.edit', compact('sparepart'));
    }

    public function update(Request $request, $id)
    {
        $sparepart = Sparepart::findOrFail($id);

        $sparepart->update($request->all());

        return redirect('/admin/sparepart')->with('success', 'Sparepart diupdate');
    }

    public function destroy($id)
    {
        Sparepart::destroy($id);
        return back()->with('success', 'Sparepart dihapus');
    }
}