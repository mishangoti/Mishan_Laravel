@extends('shop.layout.app')

@section('content')
{{-- {{ dd($post_list) }} --}}
{{-- {{ dd($post_list[0]['id']) }} --}}
{{-- {{ dd($post_list[0]['posttype'][0]['name']) }} --}}
<div class="container">
    <center><h4>List Of Category</h4></center>
    <div class="row justify-content-center">  
            <a href="/blogs" class="button button-black link">All</a>
            {{-- @foreach ($category_list as $category)
            
                <a href="#" class="button button-black link">{{ $category['name'] }}</a>
            
            @endforeach  --}}
    </div>
    <hr>
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">    
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center">

        @foreach ($post_list as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b>{{ $item['title'] }}</b>    
                    </div>
                   
                    <div class="card-body">
                        <img src="#" alt="blog_image" class="img-responsive">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('single_blog',$item['id']) }}" class="btn btn-sm btn-info">Read More</a>
                            </div>
                            <div class="col-md-6">
                                <b>Category:</b> {{ $item['posttype'][0]['name'] }}
                            </div>
                        </div>
                    </div>
                </div> <br>
            </div> 
        @endforeach
        


    </div>
</div>
@endsection
