@extends('layouts.app')
@section('main')
<div class="container">
  {{-- view product --}}
  <div class="row">
    <div class="col-lg-8 mx-auto mt-5">
        <div class="rounded border shadow p-4">
            <div class="d-inline">
                <h4>
                    {{$product->name}}
                </h4>
                <small class="text-muted">
                    {{$product->created_at}}
    
                </small>
            </div>
            <p class="mt-3">
                {{$product->description}}
            </p>
            <div><img src="/products/{{$product->image}}" width="100%" alt=""></div>
            <div class="mt-3 text-end">
                <a href="/" class="text-decoration-none ">Go-back</a>
            </div>
        </div>
    </div>
  </div>


  

</div>
@endsection