@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('lang.Brand')}} {{__('lang.Add')}}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('brands.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('lang.Brand')}} {{__('lang.Name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter brand name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">{{__('lang.Brand')}} {{__('lang.Website')}}</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Enter brand website">
                                @error('website')
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
