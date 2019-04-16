@extends('shop.layout.app')

@section('content')
{{-- {{ dd($post_list) }} --}}
{{-- {{ dd($post_list[0]['id']) }} --}}
{{-- {{ dd($post_list[0]['posttype'][0]['name']) }} --}}
<div class="container">
    <h4>List Of Category</h4>
    <hr>
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">    
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <b>{{ $post[0]['title'] }}</b>    
                    </div>
                   
                    <div class="card-body">
                        <img src="#" alt="blog_image" class="img-responsive">
                        <hr>
                        {{ $post[0]['description'] }}
                        <div class="row">
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3">
                                <b>Category:</b> {{ $post[0]['posttype'][0]['name'] }}
                            </div>
                        </div>
                    </div>
                </div> <br>
            </div> 

    </div>
</div>
@endsection
