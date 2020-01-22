@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">C ADMIN Dashboard</div>
                <div class="panel-body">
                   
                    

@if($c_admin->c_admin_profile->verified !==1)
<div class="alert alert-danger"><p>the user is not verified</p></div>

@elseif($c_admin->c_admin_profile->verified ===1)
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
                <img src="{{ $c_admin->c_admin_profile->profileImage() }}" class="rounded-circle w-50">
        </div>
        <div class="container">
          <div class="row">
              <div class="col-8 offset-2">
                   @can('update', $c_admin->c_admin_profile)
                       @forelse ($unverified_alumni as $alumni)
                       <div>
                           <a href="{{$c_admin->id}}/view/{{$alumni->id}}">{{$alumni->name}}</a>
                       </div>
                       @empty
                           sdfsd
                       @endforelse
                       @endcan
                      </div>
                </div>
        </div>

                    <div class="font-weight-bold">
                        {{$c_admin->c_admin_profile->url}}
                        {{$c_admin->college}}
                    </div>

                USer c_admin_profile 

            @can('update', $c_admin->c_admin_profile)
                <a href="/c_admin_profile/{{ $c_admin->id }}/edit">Edit Profile</a>
            @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
