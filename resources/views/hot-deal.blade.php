@extends('layout')

@section('content')
<section class="products">
    <div class="container">
        <div class="products_outer">
            <ul>
                @foreach($products as $product)
                <a href="{{$product['dealurl']}}" target="_blank">
                <li>
                    <div class="porduct">
                        <div class="row margin_zero">
                            <div class="col-md-4">
                                <div class="product_img">
                                    @if($product['pictureurl'])
                                    <img src="{{$product['pictureurl']}}">
                                    @else
                                    <img src="{{url('images/no-image.png')}}">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8 ">
                                <a href="{{$product['dealurl']}}" target="_blank"><h1>{{$product['title']}}</h1></a>
                                <div class="row">
                                    <div class="col-md-11">
                                    </div>
                                    <div class="col-md-1">
                                        <p><span class="productPrice">${{$product['convertedcurrentprice']}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 socialShareRow">
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style pull-right" data-a2a-url="{{$product['dealurl']}}" data-a2a-title="I Like this!">
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
