@extends('layouts.admin.main')

@section('title', 'Detail Riwayat Pembelian')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Detail Riwayat Pembelian</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.history') }}">Riwayat Pembelian</a>
                </div>

                <div class="breadcrumb-item">
                    Detail
                </div>
            </div>
        </div>

        <a href="{{ route('admin.history') }}" class="btn btn-warning mb-3">
            Kembali
        </a>

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $data->user->name }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $data->product->name }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Kategori Produk</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $data->product->category }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $data->qty }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="text"
                           class="form-control"
                           value="{{ number_format($data->total_harga) }}"
                           readonly>
                </div>

            </div>
        </div>

    </section>
</div>
@endsection