@extends('frontend.master')

@section('frontend_content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h2 class="my-5 bg-success text-center">User list</h2>
                <table class="table">
                    <tr>
                        <th>SL NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>           
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->phone_number}}</td>
                            <td>
                                <a href="#">button</a>
                            </td>
                        </tr>
                    @endforeach           
                </table>
            </div>
        </div>
    </div>

@endsection