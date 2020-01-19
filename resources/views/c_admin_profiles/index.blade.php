@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">C ADMIN Dashboard</div>
fuckersssssssss
                <div class="panel-body">
                   
                    


<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{ $c_admin->c_admin_profile->profileImage() }}" class="rounded-circle w-50">
        {{-- <img src="{{ $c_admin->c_admin_profile->profileImage() }}" class="rounded-circle w-50"> --}}
        {{-- <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3"> --}}
                    {{-- <div class="h4">{{ $c_admin ?? ''->username }}</div> --}}

                    {{-- <follow-button c_admin-id="{{ $c_admin ?? ''->id }}" follows="{{ $follows }}"></follow-button> --}}
                </div>

                {{-- {{-- @can('update', $c_admin ?? ''->c_admin_profile) --}}
                    {{-- <a href="/p/create">Add New Post</a> --}}
                {{-- @endcan --}} --}}


                    <div class="font-weight-bold">
                        {{$c_admin->c_admin_profile->url ?? 'yeahhhhhh'}}
                    </div>

                USer c_admin_profile fuckaaa
            {{-- </div> --}}

            {{-- @can('update', $c_admin ?? ''->c_admin_profile) --}}
                <a href="/c_admin_profile/{{ $c_admin->id }}/edit">Edit Profile</a>
            {{-- @endcan --}}
{{-- 
            <div class="d-flex">
                <div class="pr-5"><strong>{postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{followingCount }}</strong> following</div>
            </div> --}}
            {{-- <div class="pt-4 font-weight-bold">{{ $c_admin ?? ''->c_admin_profile->title }}</div>
            <div>{{ $c_admin ?? ''->c_admin_profile->description }}</div>
            <div><a href="#">{{ $c_admin ?? ''->c_admin_profile->url }}</a></div>
        </div>
    </div> --}}

    {{-- <div class="row pt-5">
        @foreach($c_admin ?? ''->posts as $post)
            <div class="col-4 pb-4">
                {{-- <a href="/p/{{ $post->id }}"> --}}
                    {{-- <img src="/storage/{{ $post->image }}" class="w-100"> --}}
                {{-- </a> --}}
            {{-- </div>
        @endforeach
    </div>
</div> --}} --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
