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
                        <form action="">
                            <input type="text" placeholder="Keyword(Option)" name="search"></input>
                                <select>
                                    <option value="">Category</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select> 

                                <select>
                                    <option value="">Ebay site</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select> 
                            <input type="text" placeholder="Max price" name="price"></input>
                            <input type="button" value="SEARCH" name="price"></input>
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
