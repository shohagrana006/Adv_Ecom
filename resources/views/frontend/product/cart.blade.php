@extends('frontend.master')
@section('frontend_content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{session('message')}}
                </div>
              @endif
              @if(session()->has('remove'))
                <div class="alert alert-danger">
                  {{session('remove')}}
                </div>
              @endif

              @if (empty($products))
                <div class="alert alert-danger mt-4">
                  <p>Your cart is empty !! <a href="{{route('frontend.index')}}">add some porducts</a></p>
                </div>              
              @else   
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Product name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>                      
                        <th>Total Price</th>                      
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                       $i = 1;
                      @endphp
                   
                      @foreach ($products as $key => $product)
                        <tr>
                          <th>{{ $i++ }}</th>
                          <td>{{$product['title']}}</td>
                          <td><small>tk.</small> {{number_format($product['unit_price'],2)}}</td>
                          <td><input type="number" value="{{$product['quantity']}}"></td>
                          <td><small>tk.</small>  {{number_format($product['total_price'],2)}}</td>
                          <td>
                            <form action="{{route('frontend.cart.remove')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$key}}">
                              <button type="submit" class="btn btn-sm btn-warning">Remove</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" class="text-end">Total Price</td>
                        <td><small>tk.</small>{{number_format($total,2)}}</td>
                      </tr>
                    </tfoot>                                                    
                  </table>
                  <div>
                    <form action="{{route('frontend.cart.clear')}}" method="post">
                      @csrf                     
                      <button type="submit" class="btn btn-sm btn-danger">Clear Cart</button>
                    </form>
                  </div>
                  @endif                           
            </div>
        </div>
    </div>
@endsection