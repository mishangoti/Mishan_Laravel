@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        @method('POST')
                        {{-- category Name --}}
                        <div class="form-group row">
                            <label for="cat_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="cat_name" type="text" class="form-control{{ $errors->has('cat_name') ? ' is-invalid' : '' }}" name="cat_name" value="{{ old('cat_name') }}"  autofocus>
                                @if ($errors->has('cat_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- category description --}}
                        <div class="form-group row">
                            <label for="cat_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="cat_description" class="form-control{{ $errors->has('cat_description') ? ' is-invalid' : '' }}" name="cat_description" value="{{ old('pro_name') }}"></textarea>
                                @if ($errors->has('cat_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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
