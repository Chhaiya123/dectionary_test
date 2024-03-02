@extends('welcome')
@section('profile')

<div class="col-12 col-md-6 col-lg-5 col-xl-4 m-auto"> 
    <div class="card p-3 m-auto">
        {{-- <img src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../img/logo.jpg'}}" class="card-img-top" alt="..."> --}}
        <div class="card-profile">
            {{-- <img src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../img/logo.jpg'}}" class="img-fluid" alt="..."> --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{Auth::User()->name}}</h5>
            <p class="card-text small">{{Auth::User()->birth}}</p>
            <p class="card-text">{{Auth::User()->bio}}</p>
        </div>
    </div>
</div>



@endsection