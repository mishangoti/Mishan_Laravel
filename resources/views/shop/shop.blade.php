@extends('shop.layout.app')

@section('content')
<div class="container">
    
    <center><h4>List Of Category</h4></center>
    <div class="row justify-content-center">  
            <a href="/shop/all" class="button button-black link">All</a>
            @foreach ($category_list as $category)
            
                <a href="#" class="button button-black link">{{ $category['name'] }}</a>
            
            @endforeach 
    </div>
    <hr>
    <div class="row justify-content-center" >
        @foreach ($product_list as $product)
            <div class="col-md-3 div_height">
                <div class="card">
                    <div class="card-header">{{ $product['name'] }}</div>
                    <div class="card-body">
                        {{ $product['description'] }}
                        <a href="{{ route('add_to_cart', $product['id']) }}"  class="button1 button1-blue link">Add To Cart</a>            
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection