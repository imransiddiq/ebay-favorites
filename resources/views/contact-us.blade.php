@extends('layout')

@section('content')
<div class="contact_outer">
    <div class="container">
        <div class="row margin_zero">
            <div class="col-md-1">
            </div>

            <div class="col-md-10">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ $errors->first('message') }}
                    </div>
                @endif
                @if (Session::has('alert_message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('alert_message') }}
                    </div>
                @endif
                <div class="contact_box">
                    <div class="contact_box_title">
                        <h1>contact us</h1>
                    </div>

                    <div class="contact_box_inner">
                        <h2>Questions? Problems? Suggections?</h2>
                        <p>Feel free to contact us!</p>
                        <form method="post" action="{{url('contact-us')}}">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <textarea name="message"></textarea>
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-1">
            </div>
        </div>
    </div>
</div>
@endsection
