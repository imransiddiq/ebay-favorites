@extends('layout')

@section('content')
<div class="banner_nav">
    <div class="container">
        <div class="banner_btn">
            <div class="row">
                <div class="banner_btn_bg">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="{{url('no-bids')}}">
                            <div class="banner_btn_img">
                                <img src="images/bottom_action.png">
                            </div>
                            <div class="banner_btn_txt">
                                <span>No Bids</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="{{url('favorite-products')}}">
                            <div class="banner_btn_img">
                                <img src="images/b_favourites.png">
                            </div>
                            <div class="banner_btn_txt">
                                <span>Favourites</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="{{url('customer-purchases')}}">
                            <div class="banner_btn_img">
                                <img src="images/b_cart.png">
                            </div>
                            <div class="banner_btn_txt">
                                <span>Customer Purchase</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="{{url('hot-deals')}}">
                            <div class="banner_btn_img">
                                <img src="images/b_deals.png">
                            </div>
                            <div class="banner_btn_txt">
                                <span>Hot Deals</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
