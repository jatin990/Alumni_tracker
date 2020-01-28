@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">dADMIN Dashboard</div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 p-5">
                                <img src="{{ $d_admin->d_admin_profile->profileImage() }}"
                                    class="rounded-circle w-50" />
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        {{-- @can('update', $d_admin->c_admin_profile) --}}
                                        @forelse ($unverified_c_admin as
                                        $c_admin)
                                        <div>
                                            <a href="{{$d_admin->id}}/view/{{$c_admin->id}}">{{$c_admin->name}}</a>
                                        </div>
                                        @empty
                                        <div class="alert alert-success">
                                            there are no unverified c_admin for
                                            your college
                                        </div>
                                        @endforelse
                                        {{-- @endcan --}}
                                    </div>
                                </div>
                            </div>

                            <div class="font-weight-bold">
                                {{$d_admin->d_admin_profile->url}}
                            </div>

                            USer d_admin_profile @auth('d_admin') @can('update',
                            $d_admin->d_admin_profile)
                            <a href="/d_admin_profile/{{ $d_admin->id }}/edit">Edit Profile</a>
                            @endcan @can('update', $d_admin->d_admin_profile)
                            <a href="/d_admin_profile/{{ $d_admin->id }}/events">add event</a>
                            @endcan @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
</div>