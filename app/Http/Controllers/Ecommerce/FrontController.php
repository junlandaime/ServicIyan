<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        //MEMBUAT QUERY UNTUK MENGAMBIL DATA PRODUK YANG DIURUTKAN BERDASARKAN TGL TERBARU
        //DAN DI-LOAD 10 DATA PER PAGENYA
        $products = Product::orderBy('created_at', 'DESC')->where('status', 1)->paginate(3);
        //LOAD VIEW INDEX.BLADE.PHP DAN PASSING DATA DARI VARIABLE PRODUCTS
                $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        
        return view('ecommerce.index', compact('products', 'posts'));

    }

    public function product()
    {
        //BUAT QUERY UNTUK MENGAMBIL DATA PRODUK, LOAD PER PAGENYA KITA GUNAKAN 12 AGAR PRESISI PADA HALAMAN TERSEBUT KARENA DALAM SEBARIS MEMUAT 4 BUAH PRODUK
        $products = Product::orderBy('created_at', 'DESC')->where('status', 1)->paginate(12);
        //LOAD JUGA DATA KATEGORI YANG AKAN DITAMPILKAN PADA SIDEBAR
        
        //LOAD VIEW PRODUCT.BLADE.PHP DAN PASSING KEDUA DATA DIATAS
        return view('ecommerce.product', compact('products'));
    }

    public function categoryProduct($slug)
    {
       //JADI QUERYNYA ADALAH KITA CARI DULU KATEGORI BERDASARKAN SLUG, SETELAH DATANYA DITEMUKAN
       //MAKA SLUG AKAN MENGAMBIL DATA PRODUCT YANG BERELASI MENGGUNAKAN METHOD PRODUCT() YANG TELAH DIDEFINISIKAN PADA FILE CATEGORY.PHP SERTA DIURUTKAN BERDASARKAN CREATED_AT DAN DI-LOAD 12 DATA PER SEKALI LOAD
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        //LOAD VIEW YANG SAMA YAKNI PRODUCT.BLADE.PHP KARENA TAMPILANNYA AKAN KITA BUAT SAMA JUGA
        return view('ecommerce.product', compact('products'));
    }

    public function show($slug)
{
    //QUERY UNTUK MENGAMBIL SINGLE DATA BERDASARKAN SLUG-NYA
    $product = Product::with(['category'])->where('slug', $slug)->first();
    //LOAD VIEW SHOW.BLADE.PHP DAN PASSING DATA PRODUCT
    return view('ecommerce.show', compact('product'));
}

    public function blog()
    {
        return view('ecommerce.blog');
    }

    public function kontak()
    {
        return view('ecommerce.kontak');
    }
}
