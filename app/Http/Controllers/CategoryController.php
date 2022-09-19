<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        
        return view('categories.index', compact('category', 'parent'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/categoryproducts', $filename);
            
        // $request->request->add(['slug' => $request->name]);

        Category::create([
            'name' => $request->name,
                'slug' => $request->name,
                'image' => $filename
        ]);

        return redirect(route('category.index'))->with(['success' => 'Kategori Baru Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('categories.edit', compact('category', 'parent'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $category = Category::find($id);
        $filename = $category->image;

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/categoryproducts', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            Storage::delete('public/categoryproducts/' . $category->image);
        }
        
        $category->update([
            'name' => $request->name,
            'slug' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $filename
        ]);

        return redirect(route('category.index'))->with(['success' => 'Kategori Diperbaharui!']);
    }

    public function destroy($id)
    {
        $category = Category::withCount(['child', 'product'])->find($id);
        if ($category->child_count == 0 && $category->product_count == 0) {
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Kategori Berhasil Dihapus!']);
        }

        return redirect(route('category.index'))->with(['error' => 'Kategori Ini Sedang Digunakan di Anak Kategori atau di Produk!']);
    }
}
