@extends('welcome')
@Section('forgot_password')

<div class="col-12 col-md-6 m-auto">
    <div class="card p-3">
        <p>Reset Password</p>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 text-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="row g-3 needs-validation" novalidate  method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <p>
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                    
                </div>
                {{-- @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif --}}
            </div>
           
            
           
            <div class="col-12">
                
                <button class="btn btn-primary" type="submit">Email Password Reset Link</button>
            </div>
        </form>
    </div>
</div>

{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

@endsection