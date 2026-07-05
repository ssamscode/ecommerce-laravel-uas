@extends('layouts.admin.main')

@section('title', 'Riwayat Pembelian')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Riwayat Pembelian</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item">
                    Riwayat Pembelian
                </div>
            </div>
        </div>

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($histories as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->user->name }}</td>

                                <td>{{ $item->product->name }}</td>

                                <td>{{ $item->qty }}</td>

                                <td>{{ number_format($item->total_harga) }}</td>

                                <td>

                                    <a href="{{ route('history.detail',$item->id) }}"
                                        class="btn btn-info btn-sm">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    Belum ada riwayat pembelian

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>
</div>
@endsection