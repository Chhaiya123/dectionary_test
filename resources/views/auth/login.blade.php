@extends('welcome')
@Section('login')

<div class="col-12 col-md-6 m-auto">
    <div class="card p-3">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
           <h1 class="h1">Login </h1>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required autofocus autocomplete="username" placeholder="Email">
                    
                </div>
                
            </div>
            <div class="col-md-12">
                <label for="validationCustomPassword" class="form-label">Password</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="validationCustomPassword" name="password" aria-describedby="inputGroupPrepend" required required autocomplete="current-password" placeholder="Password">
               </div>
                {{-- @if ($errors->has('password'))
                    <small class="text-danger mb-3">{{ $errors->first('password') }}</small>
                @endif --}}
            </div>
            <div class="col-md-12">
                <div class="form-check">
                    <input id="remember_me" name="remember" class="form-check-input" type="checkbox">
                    <label class="form-check-label" for="remember_me">
                        Remember me
                    </label>
                </div>
                <div class="my-2">
                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
           
            <div class="col-12">
                
                <button class="btn btn-primary" type="submit">Submit form</button>
                <a href="{{route('register')}}">Create Accrount</a>
                
            </div>
        </form>
    </div>
</div>


@endsection
