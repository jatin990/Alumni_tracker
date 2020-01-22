@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
             <div class="panel-heading">alumni Dashboard</div>
                <div class="panel-body">
                    @if($user->profile->verified !==1)
<div class="alert alert-danger">the user is not verified</div>

@auth('c_admin')
<form action="{{route('profile.verify',['c_admin'=>auth()->user()->id,'user'=>$user->id,])}}" method="post">
        @csrf
        @method('PATCH')
<button class="btn btn-primary">verify</button>
</form>
@endauth
@endif
        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50">
</div>

                    <div class="font-weight-bold">
                        {{$user->profile->url }}
                        {{$user->college }}
                    </div>

                USer profile
          
@if(auth()->guard('web')->check())
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
@endif
<div>
            @can('update', $user->profile)
                <a href="{{ $user->id }}/connect">get connected</a>
            @endcan

</div>
 

@endsection
