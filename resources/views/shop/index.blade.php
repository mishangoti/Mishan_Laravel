@extends('shop.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- {{ dd($product_list) }} --}}
        {{-- <div class="col-md-3">
            <div class="card">
                <div class="card-header">user1</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif            
                </div>
            </div>
        </div> --}}
        wellcome user
    </div>
</div>
@endsection
