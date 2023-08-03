@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h1 class="mb-5 mt-3">Add new product</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <form action="/products/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Product Name here....">
                    @if ($errors->has('name'))
                    <span class="text-danger"> {{ $errors->first('name') }} </span>   
                    @endif
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" id="" cols="" rows="3" placeholder="Product Description">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger"> {{ $errors->first('description') }} </span>    
                    @endif
                </div>
                <div class="mb-3">
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    @if ($errors->has('image'))
                    <span class="text-danger"> {{ $errors->first('image') }} </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-outline-dark">Add Product</button>
            </form>
        </div>
    </div>
@endsection