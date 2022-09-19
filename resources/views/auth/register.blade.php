@extends('layouts.apps')

@section('content')
<div class="card-body p-0">
    <!-- Nested Row within Card Body --><div class="card-header">{{ __('Register') }}</div>

    <div class="row">
        
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name"
                         value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleInputEmail"
                            placeholder="Input your name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user  @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail"
                            placeholder="Email Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="new-password"
                                id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user"
                                id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
           
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Register') }}
                    </button>
                    <hr>
                  
                </form>
                <hr>
               
            </div>
        </div>
    </div>
</div>
@endsection
