@extends('welcome')
@section('register')
<div class="col-12 col-md-6 m-auto">
    <div class="card px-4 py-5">
        <form class="row g-3 needs-validation" novalidate action="{{ route('register') }}" method="post">
            @csrf
            <h1>Register</h1>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="validationCustom01" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
                {{-- @if ($errors->has('name'))
                    <small class="text-danger w-100">{{ $errors->first('name') }}</small>
                @endif --}}
            </div>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <input type="email" class="form-control" name="email" id="validationCustomUsername" :value="old('email')" required autocomplete="username" aria-describedby="inputGroupPrepend" required placeholder="Email">                 
                {{-- @if ($errors->has('email'))
                    <small class="text-danger w-100">{{ $errors->first('email') }}</small>
                @endif --}}
            </div>
            <div class="col-md-12">
                <label for="validationCustomPassword" class="form-label">Password</label>
                
                <input type="password" class="form-control" name="password" id="validationCustomPassword" aria-describedby="inputGroupPrepend" required autocomplete="new-password" placeholder="Password">
                {{-- @if ($errors->has('password'))
                    <small class="text-danger w-100">{{ $errors->first('password') }}</small>
                @endif --}}
            </div>
            <div class="col-md-12">
                <label for="validationCustomRePassword" class="form-label">password confirmation</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control" name="password_confirmation" id="repass"  required autocomplete="new-password" aria-describedby="inputGroupPrepend" required placeholder="Password confirmation">
                </div>
            </div>
           
            
            <div class="col-12 text-end">
                <a class="link me-3" href="{{route('login')}}">Already registered?</a>
                <button class="btn btn-primary px-4 my-3" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection



{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
