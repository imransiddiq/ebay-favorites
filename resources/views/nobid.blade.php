@extends('layout')

@section('content')
<div class="no_bits_outer">
    <div class="container">
        <div class="row margin_zero">
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <div class="box_">
                    <div class="box_title">
                        <h1><img src="images/ebay.png"> Ebay</h1>
                    </div>

                    <div class="no_bits_inner">
                        <form action="{{url('nobid-products')}}" id="noBidForm" method="GET">
                            <!-- <input type="hidden" placeholder="" name="type" value="nobid"></input> -->
                            <input type="text" placeholder="Keyword(Option)" name="search"></input>
                                <select name="category">
                                    @foreach($categories as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select> 

                                <select name="country">
                                    @foreach($countries as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select> 
                            <input type="text" placeholder="Max price" name="max_price"></input>
                            <input type="button" class="getNobid" value="SEARCH" name=""></input>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>
@endsection
