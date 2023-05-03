<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// memanggil model catalog
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function index()
    {
        // memanggil data catalog
        $catalog = Catalog::with('books')->get();
        return view('admin.Catalog.Catalog', compact('catalog'));
    }

    public function create()
    {
        return view('admin.Catalog.create');
    }

    public function edit($id)
    {
        $catalog = Catalog::find($id);
        return view('admin.Catalog.edit', compact('catalog'));
    }
    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);
        $catalog->name = $request->name;
        $catalog->save();
        return redirect()->route('catalogIndex');
    }
    public function destroy($id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();
        return redirect()->route('catalogIndex');
    }
}
