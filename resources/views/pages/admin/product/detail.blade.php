@extends('layouts.admin.main')
@section('title', 'Admin Detail Product')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Detail Produk</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>

                <div class="breadcrumb-item">
                    Detail Produk
                </div>
            </div>
        </div>

        <a href="{{ route('admin.product') }}"
            class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">

                <article class="article article-style-c">

                    <div class="article-header">
                        <div class="article-image"
                            data-background="{{ asset('images/' . $product->image) }}">
                        </div>
                    </div>

                    <div class="article-details">

                        <h2>{{ $product->name }}</h2>

                        <table class="table table-borderless mt-3">

                            <tr>
                                <th width="200">Distributor</th>
                                <td>
                                    {{ $product->distributor->nama_distributor ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>Kategori</th>
                                <td>
                                    {{ $product->category }}
                                </td>
                            </tr>

                            <tr>
                                <th>Harga</th>
                                <td>
                                    {{ $product->price }} Points
                                </td>
                            </tr>

                        </table>

                        <hr>

                        <h5>Deskripsi Produk</h5>

                        <p>
                            {{ $product->description }}
                        </p>

                    </div>

                </article>

            </div>
        </div>

    </section>
</div>
@endsection