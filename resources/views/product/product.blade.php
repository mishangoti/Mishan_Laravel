@extends('layouts.app')

@section('content')
<div class="container">
    <div> 
       {{-- {{ dd($product_list[0]['category'][0]['name']) }} --}}
       {{-- {{ dd($product_list) }} --}}
        @if(Session::has('message'))
          
            <div class="alert alert-success">    
                {{ Session::get('message') }}
            </div>

        @endif
    </div><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product List</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
               <?php
                    $sr = 1;
               ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Category_id</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                        <th><a class="btn btn-info" href="{{ route('add_product') }}">Add New Product</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_list as $item)
                        <tr>
                            <td>{{ $sr }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['category'][0]['name'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['stock'] }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('edit_product',$item['id']) }}">EDIT</a>
                                <a class="btn btn-success" href="{{ route('view_product',$item['id']) }}">VIEW</a>
                                <a class="btn btn-danger delete_product" onclick="return confirm('Are you sure you want to delete Product?')" href="{{ route('delete_product',$item['id']) }}">DELETE</a>
                                <a class="btn btn-warning" href="{{ route('addimages_product',$item['id']) }}">Add Images</a>                                
                            </td> 
                        </tr>
                            <?php $sr++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

    {{-- <script>
        $(document).ready(function){
            $('#delete_product').click(){
                if(confirm("Are you sure you want to delete Product?")){
                    return true;
                }else{
                    return false;
                }
            }
        }
    </script> --}}