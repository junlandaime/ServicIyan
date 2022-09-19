<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function front()
    {
        $title = '';
        if (request('category')) {
            $category = Kategory::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('ecommerce.posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->where('status', 1)->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }

    public function categories()
    {
        return view('posts.categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Kategory::all()
        ]);
    }

    public function category(Kategory $category)
    {
        return view('posts.posts', [
            'title' => "Post by Category: $category->name",
            'active' => 'categories',
            'posts' => $category->posts->load(['author', 'category'])
        ]);
    }

    public function author(User $author)
    {
        return view('posts.posts', [
            'title' => "Post By Author : $author->name",
            'active' => 'active',
            'posts' => $author->posts->load(['author', 'category'])
        ]);
    }

    public function index()
    {
        $post = Post::with(['kategory'])->orderBy('created_at', 'DESC');

        if (request()->q != '') {
            $post = $post->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $post = $post->paginate(10);

        return view('posts.index', compact('post'));
    }

    public function create()
    {
        $category = Kategory::orderBy('name', 'DESC')->get();

        return view('posts.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'body' => 'required',
            'kategory_id' => 'required|exists:kategories,id',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/posts', $filename);
            
            $post = Post::create([
                'title' => $request->title,
                'slug' => $request->title,
                'kategory_id' => $request->kategory_id,
                'user_id' => 1,
                'body' => $request->body,
                'excerpt' => $request->body,
                'image' => $filename,
                'status' => $request->status
            ]);
            
            return redirect(route('post.index'))->with(['success' => 'Post Baru Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $post = Post::find($id); //AMBIL DATA PRODUK TERKAIT BERDASARKAN ID
        $category = Kategory::orderBy('name', 'DESC')->get(); //AMBIL SEMUA DATA KATEGORI
        return view('posts.edit', compact('post', 'category')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
    }

    public function update(Request $request, $id)
    {
    //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'body' => 'required',
            'kategory_id' => 'required|exists:kategories,id',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $post = Post::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $post->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
    
        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/posts', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            Storage::delete('public/posts/' . $post->image);
        }
        

    //KEMUDIAN UPDATE PRODUK TERSEBUT
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'kategory_id' => $request->kategory_id,
            'image' => $filename,
            'status' => $request->status
        ]);
        return redirect(route('post.index'))->with(['success' => 'Data Postingan Diperbaharui']);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

                $post->delete();

        return redirect(route('post.index'))->with(['success' => 'Postingan Sudah Dihapus']);
    }
}
