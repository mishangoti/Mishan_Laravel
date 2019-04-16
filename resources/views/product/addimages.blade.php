@extends('layouts.app')

{{-- {{ dd($product1) }} --}}
{{-- {{ dd($product1['id']) }} --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product')}}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('store_images') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product1['id'] }}" name="pro_id">
                        {{-- product image --}}
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="file" required type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file[]" value="{{ old('file') }}" multiple>

                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
