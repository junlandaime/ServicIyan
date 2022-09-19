@extends('layouts.admin')

@section('title')
    <title>Tambah Postingan</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Postingan</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Postingan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Judul Postingan</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title') }}" required>
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Tulisan Full</label>

                                        <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                        <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                                        <p class="text-danger">{{ $errors->first('body') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Publish
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategory_id">Kategori</label>

                                        <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                        <select name="kategory_id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ old('kategory_id') == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('kategory_id') }}</p>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ old('price') }}" required>
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Berat</label>
                                        <input type="number" name="weight" class="form-control"
                                            value="{{ old('weight') }}" required>
                                        <p class="text-danger">{{ $errors->first('weight') }}</p>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="image">Foto Postingan</label>
                                        <input type="file" name="image" class="form-control"
                                            value="{{ old('image') }}" required>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

<!-- PADA ADMIN LAYOUTS, TERDAPAT YIELD JS YANG BERARTI KITA BISA MEMBUAT SECTION JS UNTUK MENAMBAHKAN SCRIPT JS JIKA DIPERLUKAN -->
@section('js')
    <!-- LOAD CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
        CKEDITOR.replace('body');
    </script>
@endsection
