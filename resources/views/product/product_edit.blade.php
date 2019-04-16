@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('update_product',$product['id']) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- product Name --}}
                        <div class="form-group row">
                            <label for="pro_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="pro_name" type="text" class="form-control{{ $errors->has('pro_name') ? ' is-invalid' : '' }}" name="pro_name" value="{{ $product['name'] }}" required autofocus>

                                @if ($errors->has('pro_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pro_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- product description --}}
                        <div class="form-group row">
                            <label for="pro_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="pro_description" class="form-control{{ $errors->has('pro_description') ? ' is-require' : '' }}" name="pro_description" required>{{ $product['description'] }}</textarea>

                                @if ($errors->has('pro_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pro_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         {{-- product_category --}}
                         <div class="form-group row">
                                <label for="pro_category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <input id="pro_category" type="number" class="form-control{{ $errors->has('pro_category') ? ' is-require' : '' }}" name="pro_category" value="{{ $product['category_id'] }}" required>
    
                                    @if ($errors->has('pro_category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- price --}}
                        <div class="form-group row">
                            <label for="pro_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="pro_price" type="number" class="form-control{{ $errors->has('pro_price') ? ' is-require' : '' }}" name="pro_price" value="{{ $product['price'] }}" required>

                                @if ($errors->has('pro_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pro_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- stock --}}
                        <div class="form-group row">
                            <label for="pro_stock" class="col-md-4 col-form-label text-md-right">{{ __('Available Stock') }}</label>

                            <div class="col-md-6">
                                <input id="pro_stock" type="number" class="form-control{{ $errors->has('pro_stock') ? ' is require' : '' }}" name="pro_stock" value="{{ $product['stock'] }}" required>

                                @if ($errors->has('pro_stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pro_stock') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- product image --}}
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Product Feature Image') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}" >

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
                                    {{ __('Update') }}
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
