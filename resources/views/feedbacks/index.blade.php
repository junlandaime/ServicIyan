@extends('layouts.admin')

@section('title')
    <title>List Feedback</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Feedback</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    List Feedback
                                </h4>
                            </div>
                            <div class="card-body">
                                {{-- <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN --> --}}



                                <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Subjek</th>
                                                <th>Isi</th>
                                                <th>Created At</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                            <!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
                                            @forelse ($feedback as $row)
                                                <tr>

                                                    <td>
                                                        <strong>{{ $row->name }}</strong><br>
                                                        <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->

                                                    </td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->subject }}</td>
                                                    <td>{{ $row->message }}</td>
                                                    <td>{{ $row->created_at->format('d-m-Y') }}</td>

                                                    <!-- KARENA BERISI HTML MAKA KITA GUNAKAN { !! UNTUK MENCETAK DATA -->
                                                    <td>
                                                        <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                        {{-- <form action="{{ route('product.destroy', $row->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('product.edit', $row->id) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </form> --}}
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
                                {!! $feedback->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection