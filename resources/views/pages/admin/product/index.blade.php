@extends('layouts.admin.main')

@section('title', 'Admin Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>

        <a href="{{ route('product.create') }}"
            class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Produk
        </a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Distributor</th>
                        <th>Kategori</th>
                        <th>Harga Produk</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>

                        <td>
                            <img src="{{ asset('images/' . $item->image) }}"
                                width="80">
                        </td>

                        <td>{{ $item->name }}</td>

                        <td>
                            {{ $item->distributor->nama_distributor ?? '-' }}
                        </td>

                        <td>{{ $item->category }}</td>

                        <td>{{ $item->price }} Points</td>

                        <td>
                            <a href="{{ route('product.detail', $item->id) }}"
                                    class="badge badge-info">
                                    Detail
                            </a>
                            <a href="{{ route('product.edit', $item->id) }}"
                                    class="badge badge-warning">
                                    Edit
                           <a href="{{ route('product.delete', $item->id) }}"
    class="badge badge-danger"
    onclick="return confirm('Yakin ingin menghapus produk ini?')">
    Hapus
</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Produk Kosong
                        </td>
                    </tr>
                    @endforelse

                </table>
            </div>
        </div>

    </section>
</div>
@endsection