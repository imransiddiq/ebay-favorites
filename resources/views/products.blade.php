@extends('layout')

@section('content')
<section class="products">
    <div class="container">
        <div class="products_outer">
            <ul>
                @foreach($products as $product)
                <a href="{{$product->viewItemURL}}" target="_blank">
                <li>
                    <div class="porduct">
                        <div class="row margin_zero">
                            <div class="col-md-4">
                                <div class="product_img">
                                    <img src="{{$product->galleryURL}}">
                                </div>
                            </div>

                            <div class="col-md-8 ">
                                <h1>{{$product->title}}</h1>
                                <div class="row">
                                    <div class="col-md-10">
                                    @if(!empty($product->viewItemURL))
                                    <i class="fa fa-video-camera"></i>
                                    @endif
                                    </div>
                                    <div class="col-md-2">
                                        <p><span>${{$product->priceUSD}}</span></p>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <h2>ILS 112.85</h2>
                                        <p>0 bids</p>

                                        <h2>ILS 75.23</h2>
                                        <p>Buy it now</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><span>4am left (Today 1:13AM)</span></p>
                                        <p>From United State</p>
                                        <p>Custom Service and international tracking provide</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </li>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
