@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">dADMIN Dashboard</div>

                <div class="panel-body">
                 
            
                  <div class="container">
                        <div class="row">
                              <div class="col-3 p-5">
                                 <img src="{{ $d_admin->d_admin_profile->profileImage() }}" class="rounded-circle w-50">
                              </div>

                    <div class="font-weight-bold">
                        {{$d_admin->d_admin_profile->url ?? 'yeahhhhhh'}}
                    </div>

                USer d_admin_profile 

            @can('update', $d_admin->d_admin_profile)
                <a href="/d_admin_profile/{{ $d_admin->id }}/edit">Edit Profile</a>
            @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
