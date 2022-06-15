@extends('frontend.master')

@section('frontend_content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{$product->getFirstMediaUrl('products')}}" class="card-img-top" alt="{{$product->title}}">

                        <div class="card-body">
                            <p class="card-text">{{$product->title}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                </div>
                                <strong class="text-muted">BDT  {{$product->price}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{$products->onEachSide(2)->links()}}
    </div>
</div>
@endsection
