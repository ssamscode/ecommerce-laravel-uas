@extends('layouts.user.main')

@section('content')

<div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <img
                src="{{ asset('images/' . $data->product->image) }}"
                class="img-fluid mb-3"
                width="250">

            <h3>

                {{ $data->product->name }}

            </h3>

            <p>

                <strong>Kategori :</strong>

                {{ $data->product->category }}

            </p>

            <p>

                <strong>Harga :</strong>

                {{ number_format($data->total_harga) }} Point

            </p>

            <p>

                {{ $data->product->description }}

            </p>

            <a
                href="{{ route('user.history',auth()->id()) }}"
                class="btn btn-warning">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection