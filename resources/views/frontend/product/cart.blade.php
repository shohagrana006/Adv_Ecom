@extends('frontend.master')
@section('frontend_content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (session()->get('cart') as $p)
                          
                      
                      <tr>
                        <th>{{1}}</th>
                        <td>{{$p['title']}}</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection