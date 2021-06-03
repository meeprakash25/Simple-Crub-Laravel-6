@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">{{__('lang.Products')}}</div>
                            <div class="col-md-6"><a href="{{route('products.create')}}" class="btn btn-info btn-sm float-right">{{__('lang.Add')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" id="alert">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('lang.Product')}}</th>
                                <th scope="col">{{__('lang.Model Number')}}</th>
                                <th scope="col">{{__('lang.Brand')}}</th>
                                <th scope="col">{{__('lang.Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->model_no}}</td>
                                    <td>{{$product->Brand->name}}</td>
                                    <td>
                                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-info">{{__('lang.Edit')}}</a>
                                        <a href="#" class="btn btn-sm btn-danger confirm-delete" data-href="{{route('products.destroy',$product->id)}}"
                                           data-title="{{__('lang.Confirm Delete')}}">{{__('lang.Delete')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{__('lang.Confirmation')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">{{__('lang.Confirm Delete')}}</p>
                    <button type="button" class="btn btn-sm btn-secondary mt-1" data-dismiss="modal">{{__('lang.Cancel')}}</button>
                    <form id="delete-form" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-danger mt-1" id="delete">{{__('lang.Delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.confirm-delete', function (event) {
            $('#delete-modal').modal('show', {backdrop: 'static'});
            $('#delete-form').attr('action', $(this).attr("data-href"));
        });
        $(document).on('click', '#delete', function (event) {
            $('#delete-form').submit();
        });
    </script>
@endsection
