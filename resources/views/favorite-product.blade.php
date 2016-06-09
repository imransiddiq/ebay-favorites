@extends('layout')

@section('content')
<section class="products">
    <div class="container">
        <div class="products_outer">
            <ul>
                @foreach($products as $product)
                <li>
                    <div class="porduct">
                        <div class="row margin_zero">
                            <div class="col-md-4">
                                <div class="product_img">
                                    <a href="{{$product->viewItemURL}}" target="_blank">
                                        <img src="{{$product->galleryURL}}">
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 ">
                                <a href="{{$product->viewItemURL}}" target="_blank"><h1>{{$product->title}}</h1></a>
                                <div class="row">
                                    <div class="col-md-11">
                                    </div>
                                    <div class="col-md-1">
                                        <p><span>${{$product->priceUSD}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 socialShareRow">
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style pull-right" data-a2a-url="{{$product->viewItemURL}}" data-a2a-title="I Like this!">
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_google_plus"></a>
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                        </div>       
                                    </div>
                                    <div class="col-md-1 pull-right">
                                        <a href="javascript:void(0);" class="socialShareIcon"><i class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-xs-6">
                                    </div>
                                    <div class="col-xs-6">
                                            
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
                <!-- </a> -->
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
