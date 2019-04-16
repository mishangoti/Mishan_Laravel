@extends('shop.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Contact Us </h2>
            <form action="{{ url('contactus') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                </div>
                <div>
                    <input type="submit" value="Submit" name="submit" class="btn"> 
                </div>
            <form>
        </div>
    </div>
</div>
@endsection
