@extends('welcome')
@section('home')
@auth

<div class="col-12 col-md-5 col-lg-4 "> 
    <div class="card p-3">
        <div class="card-profile">
            <img  src="{{Auth::User()->image ? 'https://lh3.googleusercontent.com/a/' : '../../img/logo.jpg'}}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{Auth::user()->name}}</h5>
            <p class="card-text small">{{Auth::user()->birth}}</p>
            <p class="card-text">{{Auth::user()->bio}}</p>
        </div>
    </div>
</div>
<div class="col-12 col-md-7 col-lg-8">
    <div class="row g-3">
        @forelse($data_word as $dt)
        <div class="col-12 col-md-6 col-lg-4" >
            <ul class="list-group" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dt->word_id}}">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{ $dt->word }}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">FR</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{ $dt->word_km }}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">KM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{ $dt->word_en }}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">EN</span>
                </li>
            </ul>
        </div>
        <!-- Modal -->
        <div class="modal fade ps-0" id="exampleModal{{$dt->word_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Words </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title mt-0">{{ $dt->word }}</h6>
                              <p class="card-text">{{ $dt->description }}</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title mt-0">{{ $dt->word_km }}</h6>
                              <p class="card-text">{{ $dt->description_km }}</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title mt-0">{{ $dt->word_en }}</h6>
                              <p class="card-text">{{ $dt->description_en }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <li>No items found.</li>
        @endforelse
        <div>
            <a class="nav-link float-end " href="{{route('word')}}">Views all</a>
        </div>
    </div>
</div>

@else

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
@endauth

@endsection