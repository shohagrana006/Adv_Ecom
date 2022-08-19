@extends('frontend.master')

@section('frontend_content')
@include('frontend.partials.hero')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{route('frontend.product.details', $product->slug)}}">
                            <img src="{{$product->getFirstMediaUrl('products')}}" class="card-img-top" alt="{{$product->title}}">
                        </a>
                        <div class="card-body">
                            <a href="{{route('frontend.product.details', $product->slug)}}">
                                <p class="card-text">{{$product->title}}</p>
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <form action="{{route('frontend.cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            Add to cart
                                        </button>
                                  </form>
                                </div>
                                <strong class="text-muted">
                                    @if($product->sale_price != null && $product->sale_price > 0)
                                    BDT  <del> {{$product->price}} </del> <span class="badge bg-primary">New</span> {{$product->sale_price}}
                                    @else
                                    BDT {{$product->price}} 
                                    @endif
                                </strong>
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
