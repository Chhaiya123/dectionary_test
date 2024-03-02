
{{-- @extends('welcome')
@section('reset_password')
<div class="col-12 col-md-6 m-auto">
    <div class="card px-4 py-5">
        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('password.update') }}">
            @csrf
            <h1>Reset password</h1>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <input type="email" class="form-control" id="validationCustomUsername" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="Email">                 
           
            </div>
            <div class="col-md-12">
                <label for="validationCustomPassword" class="form-label">Password</label>
                
                <input type="password" class="form-control" name="password" id="validationCustomPassword" aria-describedby="inputGroupPrepend" required autocomplete="new-password" placeholder="Password">
                
            </div>
            <div class="col-md-12">
                <label for="validationCustomRePassword" class="form-label">Confirm Password</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control" name="password_confirmation" id="repass"  required autocomplete="new-password" aria-describedby="inputGroupPrepend" required placeholder="Confirm Password">
                </div>
            </div>
           
            
            <div class="col-12 text-end">
                <a class="link me-3" href="{{route('login')}}">Already registered?</a>
                <button class="btn btn-primary px-4 my-3" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection --}}
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 style="font-size: 30px">Psychology</h1> 
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
