@extends('layouts.user.main')

@section('content')

<!--================ Banner Area =================-->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>Nike New <br>Collection!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid"
                                src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================ End Banner Area =================-->



<!--================ Product Area =================-->
<section class="section_gap">
    <div class="container">

        @if($flashSales->count())

        <div class="row justify-content-center mb-5">

            <div class="col-lg-6 text-center">

                <div class="section-title">

                    <h1>Flash Sale 🔥</h1>

                    <p>
                        Produk dengan harga promo terbatas
                    </p>

                </div>

            </div>

        </div>

        <div class="row">

            @foreach($flashSales as $sale)

            <div class="col-lg-3 col-md-6">

                <div class="single-product">

                    <img class="img-fluid"
                        src="{{ asset('images/'.$sale->product->image) }}"
                        alt="">

                    <div class="product-details">

                        <h6>
                            {{ $sale->product->name }}
                        </h6>

                        <div class="price">

                            <h6 class="text-danger">

                                {{ number_format($sale->discount_price) }} Points

                            </h6>

                            <h6 class="l-through">

                                {{ number_format($sale->product->price) }} Points

                            </h6>

                        </div>

                        <div class="prd-bottom">

                            <a href="javascript:void(0)"
                                class="social-info"
                                onclick="confirmPurchase('{{ $sale->product->id }}','{{ Auth::user()->id }}')">

                                <span class="ti-bag"></span>

                                <p class="hover-text">
                                    Beli
                                </p>

                            </a>

                            <a href="{{ route('user.product.detail',$sale->product->id) }}"
                                class="social-info">

                                <span class="lnr lnr-move"></span>

                                <p class="hover-text">
                                    Detail
                                </p>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @endif
                <div class="row justify-content-center mt-5">

            <div class="col-lg-6 text-center">

                <div class="section-title">

                    <h1>Latest Products</h1>

                    <p>
                        Produk terbaru yang dapat ditukarkan dengan point
                    </p>

                </div>

            </div>

        </div>

        <div class="row">

            @forelse($products as $item)

            <div class="col-lg-3 col-md-6">

                <div class="single-product">

                    <img class="img-fluid"
                        src="{{ asset('images/'.$item->image) }}"
                        alt="">

                    <div class="product-details">

                        <h6>

                            {{ $item->name }}

                        </h6>

                        <div class="price">

                            <h6>

                                {{ number_format($item->price) }} Points

                            </h6>

                        </div>

                        <div class="prd-bottom">

                            <a href="javascript:void(0)"
                                class="social-info"
                                onclick="confirmPurchase('{{ $item->id }}','{{ Auth::user()->id }}')">

                                <span class="ti-bag"></span>

                                <p class="hover-text">
                                    Beli
                                </p>

                            </a>

                            <a href="{{ route('user.product.detail',$item->id) }}"
                                class="social-info">

                                <span class="lnr lnr-move"></span>

                                <p class="hover-text">
                                    Detail
                                </p>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-lg-12">

                <div class="alert alert-warning text-center">

                    Belum ada produk.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmPurchase(productId, userId) {

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'

        }).then((result) => {

            if (result.isConfirmed) {

                window.location.href =
                    "{{ url('/product/purchase') }}/" + productId + "/" + userId;

            }

        });

    }
</script>

@endsection