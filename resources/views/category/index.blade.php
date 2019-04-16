@extends('layouts.app')

@section('content')
<div class="container">
    <div> 
        
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
                            <th>Description</th>
                            <th width="40%"><a class="btn btn-info" href="{{ route('category.create') }}">Add New Category</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category_list as $item)
                        <tr>
                            <td>{{ $sr }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>
                               

                                <form action="{{ route('category.destroy', $item['id'])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{ route('category.edit',$item['id']) }}">EDIT</a>
                                    <a class="btn btn-success" href="{{ route('category.show',$item['id']) }}">VIEW</a>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete Product?')" type="submit">Delete</button>
                                </form>

                            </td> 
                        </tr>
                            <?php 
                            $sr++ 
                            ?>
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