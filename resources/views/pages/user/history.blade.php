@extends('layouts.user.main')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Riwayat Pembelian
    </h2>

    <div class="row">

        @forelse($histories as $item)

            <div class="col-md-4 mb-4">

                <div class="card h-100">

                    <img
                        src="{{ asset('images/' . $item->product->image) }}"
                        class="card-img-top">

                    <div class="card-body">

                        <h5>
                            {{ $item->product->name }}
                        </h5>

                        <p>
                            {{ number_format($item->total_harga) }} Point
                        </p>

                        <a
                            href="{{ route('user.detail.history',$item->id) }}"
                            class="btn btn-primary">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <h4 class="text-center">

                    Belum ada riwayat pembelian

                </h4>

            </div>

        @endforelse

    </div>

</div>

@endsection