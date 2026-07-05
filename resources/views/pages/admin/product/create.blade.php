@extends('layouts.admin.main')

@section('title', 'Admin Tambah Product')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Tambah Produk</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>

                <div class="breadcrumb-item">
                    Tambah Produk
                </div>
            </div>
        </div>

        <a href="{{ route('admin.product') }}"
            class="btn btn-icon icon-left btn-warning">
            Kembali
        </a>

        <div class="card mt-4">

            <form action="{{ route('product.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="needs-validation"
                novalidate>

                @csrf

                <div class="card-body">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">

                                <label>Distributor</label>

                                <select name="id_distributor"
                                    class="form-control"
                                    required>

                                    <option value="">
                                        -- Pilih Distributor --
                                    </option>

                                    @foreach ($distributors as $distributor)

                                        <option
                                            value="{{ $distributor->id }}"
                                            {{ old('id_distributor') == $distributor->id ? 'selected' : '' }}>

                                            {{ $distributor->name }}

                                        </option>

                                    @endforeach

                                </select>

                                <div class="invalid-feedback">
                                    Pilih distributor terlebih dahulu.
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                <label>Nama Produk</label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi.
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                <label>Harga Produk (Point)</label>

                                <input
                                    type="number"
                                    name="price"
                                    class="form-control"
                                    value="{{ old('price') }}"
                                    required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi.
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                <label>Kategori Produk</label>

                                <input
                                    type="text"
                                    name="category"
                                    class="form-control"
                                    value="{{ old('category') }}"
                                    required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi.
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">

                                <label>Deskripsi Produk</label>

                                <textarea
                                    name="description"
                                    class="form-control"
                                    rows="6"
                                    required>{{ old('description') }}</textarea>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi.
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">

                                <div class="custom-file">

                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        name="image"
                                        id="customFile"
                                        required>

                                    <label
                                        class="custom-file-label"
                                        for="customFile">
                                        Pilih Gambar
                                    </label>

                                </div>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi.
                                </div>

                            </div>
                        </div>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Tambah

                    </button>

                </div>

            </form>

        </div>

    </section>
</div>
@endsection