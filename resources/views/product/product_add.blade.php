@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif --}}
                <div class="card-body">
                <form method="POST" action="{{ route('store_product') }}" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name='userid' value="{{ Auth::user()->id }}">
                        {{-- product Name --}}
                        <div class="form-group row">
                            <label for="pro_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="pro_name" type="text" class="form-control{{ $errors->has('pro_name') ? ' is-invalid' : '' }}" name="pro_name" value="{{ old('pro_name') }}"  autofocus>
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
                                <textarea id="pro_description" class="form-control{{ $errors->has('pro_description') ? ' is-invalid' : '' }}" name="pro_description" >{{ old('pro_description') }}</textarea>
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
                                    <select id="pro_category" name="pro_category" class="form-control{{ $errors->has('pro_category') ? ' is-invalid' : '' }}">
                                        <option>Select Category</option>                                       
                                        @foreach ($category_list as $item)
                                       
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>                                       
                                    
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pro_category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_category') }}</strong>
                                        </span>
                                    @endif
                                    {{-- <input id="pro_category" type="number" class="form-control" name="pro_category" value="{{ old('pro_category') }}" required> --}}
                                </div>
                            </div>

                        {{-- price --}}
                        <div class="form-group row">
                            <label for="pro_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="pro_price" type="number" class="form-control{{ $errors->has('pro_price') ? ' is-invalid' : '' }}" name="pro_price" value="{{ old('pro_price') }}" >
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
                                <input id="pro_stock" type="number" class="form-control{{ $errors->has('pro_stock') ? ' is-invalid' : '' }}" name="pro_stock" value="{{ old('pro_stock') }}" >

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
                                    {{ __('A D D') }}
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
