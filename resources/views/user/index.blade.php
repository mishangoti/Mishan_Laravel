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
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip Code</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_list as $item)
                        <tr>
                            <td>{{ $sr }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['phone_no'] }}</td>
                            <td>{{ $item['address'] }}</td>
                            <td>{{ $item['city'] }}</td>
                            <td>{{ $item['state'] }}</td>
                            <td>{{ $item['zip_code'] }}</td>
                            <td>
                                @if ($item['admin'] == '1')
                                    {{ 'Admin' }}
                                @else
                                    {{ 'User' }}
                                @endif
                            
                            </td>
                            <td>
            
                                <form action="{{ route('user.destroy', $item['id'])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success" onclick="return confirm('Are you sure you want to Make Him Admin?')" href="{{ route('user.edit',$item['id']) }}">CHANGE ROLL</a>
                                    <a class="btn btn-warning" href="{{ route('user.show',$item['id']) }}">VIEW</a>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete Product?')" type="submit">DELETE</button>
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