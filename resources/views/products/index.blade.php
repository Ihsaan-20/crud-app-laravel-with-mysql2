@extends('layouts.app')
@section('main')

  <h1 class="mt-3">All Products</h1>
  <div class="add-button text-end">
    <a href="/products/add" class="btn btn-outline-dark">Add new product</a>
  </div>

  <div class="table-responsive">
    @if(count($products) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="">
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>
                  <a href="/products/{{$product->id}}/view" class="text-dark text-decoration-none">
                    {{ $product->name }}
                  </a>
                </td>
                <td>
                  <a href="/products/{{$product->id}}/view" class="text-dark text-decoration-none">
                    {{ substr($product->description, 0, 50) . "..." }}
                  </a>
                 </td>
                <td>
                  <a href="/products/{{$product->id}}/view" class="text-dark text-decoration-none">
                    <img src="/products/{{ $product->image }}" 
                    class="rounded-circle" width="40" height="40" alt="product-image">
                  </a>

                    
                </td>
                <td>
                  <a href="/products/{{$product->id}}/edit" class="btn btn-outline-dark">Edit</a>
                  <form action="/products/{{$product->id}}/destory" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Data not found.</p>
    @endif
</div>

  


@endsection