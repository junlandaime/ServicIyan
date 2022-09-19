@extends('layouts.admin')

@section('title')
    <title>Edit Postingan</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Postingan</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
                <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                    @method('PUT')

                    <!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Postingan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Judul Postingan</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $post->title }}" required>
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Deskripsi</label>
                                        <textarea name="body" id="body" class="form-control">{{ $post->body }}</textarea>
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
                                            <option value="1" {{ $post->status == '1' ? 'selected' : '' }}>Publish
                                            </option>
                                            <option value="0" {{ $post->status == '0' ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategory_id">Kategori</label>
                                        <select name="kategory_id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $post->kategory_id == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('kategory_id') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Foto Postingan</label>
                                        <br>
                                        <!--  TAMPILKAN GAMBAR SAAT INI -->
                                        <img src="{{ asset('storage/posts/' . $post->image) }}" width="100px"
                                            height="100px" alt="{{ $post->name }}">
                                        <hr>
                                        <input type="file" name="image" class="form-control">
                                        <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Update</button>
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

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
