@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">View Category</div>

                <div class="card-body">
                    <label><b>Category Name : </b>{{ $category['name'] }}</label><br>
                    <label><b>Category Description : </b>{{ $category['description'] }}</label>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
