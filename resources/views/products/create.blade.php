@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('lang.Product')}} {{__('lang.Add')}}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('products.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('lang.Product')}} {{__('lang.Name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="model_no">{{__('lang.Model Number')}}</label>
                                <input type="text" class="form-control" id="model_no" name="model_no" placeholder="Enter model number">
                                @error('model_no')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand">{{__('lang.Brand')}}</label>
                                <select class="form-control" name="brand" id="brand">
                                    <option value="">{{__('lang.Select a brand')}}</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{{__('lang.Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
