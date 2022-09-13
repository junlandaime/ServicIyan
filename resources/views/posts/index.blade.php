@extends('layouts.admin')

@section('title')
    <title>List Postingan</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Postingan</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    List Postingan

                                    <!-- BUAT TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
                                    {{-- <a href="{{ route('post.bulk') }}" class="btn btn-primary btn-sm float-right">Mass
                                        Upload</a> --}}
                                    <a href="{{ route('post.create') }}"
                                        class="btn btn-primary btn-sm float-right">Tambah</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->

                                <!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
                                <form action="{{ route('post.index') }}" method="get">
                                    <div class="input-group mb-3 col-md-3 float-right">
                                        <!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                                        <input type="text" name="q" class="form-control" placeholder="Cari..."
                                            value="{{ request()->q }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button">Cari</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Postingan</th>
                                                <th>Ringkasan</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                            <!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
                                            @forelse ($post as $row)
                                                <tr>
                                                    <td>
                                                        <!-- TAMPILKAN GAMBAR DARI FOLDER PUBLIC/STORAGE/PRODUCTS -->
                                                        {{-- <img src="{{ asset('storage/products/' . $row->image) }}"
                                                            width="100px" height="100px" alt="{{ $row->name }}"> --}}
                                                    </td>
                                                    <td>
                                                        <strong>{{ $row->title }}</strong><br>
                                                        <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                                        <label>Kategori: <span
                                                                class="badge badge-info">{{ $row->kategory->name }}</span></label><br>
                                                        <label>Slug: <span class="badge badge-info">{{ $row->slug }}
                                                            </span></label>
                                                    </td>
                                                    <td>{{ $row->excerpt }}</td>
                                                    <td>{{ $row->created_at->format('d-m-Y') }}</td>

                                                    <!-- KARENA BERISI HTML MAKA KITA GUNAKAN { !! UNTUK MENCETAK DATA -->
                                                    <td>{!! $row->status_label !!}</td>
                                                    <td>
                                                        <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                        <form action="{{ route('post.destroy', $row->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('post.edit', $row->id) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                                {!! $post->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
