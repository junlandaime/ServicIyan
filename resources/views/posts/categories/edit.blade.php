@extends('layouts.admin')

@section('title')
    <title>Edit Kategori Postingan</title>
@endsection

@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Edit Kategori Postingan</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Kategori Postingan</h4>
                            </div>
                            <div class="card-body">
                                <!-- ROUTINGNYA MENGIRIMKAN ID CATEGORY YANG AKAN DIEDIT -->
                                <form action="{{ route('kategory.update', $category->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Kategori Postingan</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $category->name }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
