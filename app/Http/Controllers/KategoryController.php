<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
    public function index()
    {
        $kategory = Kategory::orderBy('created_at', 'DESC')->paginate(10);
        
        return view('posts.categories.index', compact('kategory'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        $request->request->add(['slug' => $request->name]);

        Kategory::create($request->except('_token'));

        return redirect(route('kategory.index'))->with(['success' => 'Kategori Baru Ditambahkan!']);
    }

    public function edit($id)
    {
        $category = Kategory::find($id);
        
        return view('posts.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id
        ]);

        $category = Kategory::find($id);

        $category->update([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        return redirect(route('kategory.index'))->with(['success' => 'Kategori Diperbaharui!']);
    }

    public function destroy($id)
    {
        $category = Kategory::find($id);
        
            $category->delete();
            return redirect(route('kategory.index'))->with(['success' => 'Kategori Berhasil Dihapus!']);
        
    }
}
