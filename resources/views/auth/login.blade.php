@extends('frontend.master')
@push('front_style')
@endpush

@section('frontend_content')
    
<div class="container">
    <div class="row">
        <div class="col-md-4 m-auto">
            <main class="form-signin mt-5">
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                @include('frontend.partials._message')
                <form action="{{route('frontend.login')}}" method="POST">
                    @csrf           
                    <div class="form-group mt-3">
                        <label>Email address</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label>Password</label>
                        <input type="password" class="form-control">
                    </div>
                   <div class="form-group mt-3">
                        <button class="btn btn-primary w-100" type="submit">Sign in</button>
                    </div>                 
                </form>
            </main>
        </div>
    </div>
</div>

@endsection

@push('front_script')

@endpush