@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">View Category</div>

                <div class="card-body">
                    <label><b>Name : </b>{{ $user['name'] }}</label><br>
                    <label><b>Email : </b>{{ $user['email'] }}</label><br>                    
                    <label><b>Phone Number : </b>{{ $user['phone_no'] }}</label><br>                    
                    <label><b>Address : </b>{{ $user['address'] }}</label><br>                   
                    <label><b>City : </b>{{ $user['city'] }}</label><br>                    
                    <label><b>State : </b>{{ $user['state'] }}</label><br>                    
                    <label><b>Zip Code : </b>{{ $user['zip_code'] }}</label><br>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
