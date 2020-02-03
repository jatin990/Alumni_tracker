@extends('layouts.app') @section('content')
<div id='intro' class="container">
    <div class="row">
        <div class="row mt-5 justify-content-between " style="min-height:100vh;">
            <div class="col-md-4">
                <div class="border">
                    <img src="{{ $d_admin->d_admin_profile->profileImage() }}" class="img-responsive"
                        style="max-width:22rem; max-height:22rem" />
                </div>
            </div>

            <div class="col-md-7 offset-1 pt-5">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <h3>Directorate Profile</h3>
                        @auth('d_admin')
                        @can('update',$d_admin->d_admin_profile)
                        <a href="/d_admin_profile/{{ $d_admin->id }}/edit">Edit Profile</a>
                        @endcan
                        @endauth
                    </div>

                    <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nobis
                        recusandae
                        molestias ducimus odio, officia, assumenda dolor debitis, in vitae omnis consectetur animi!
                        Tempora
                        mollitia
                        atque corporis exercitationem placeat debitis. </p>
                    <p class="text-left h2">Info</p>

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$d_admin->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><a href="mailto:{{$d_admin->email}}">{{$d_admin->email}}</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p>Web Developer and Designer</p>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <label>linkedIn</label>
                            </div>
                            <div class="col-md-6">
                                <a href="{{$d_admin->d_admin_profile->url }}">{{$d_admin->c_admin_profile->url }}</a>
                    </div>
                </div> --}}
            </div>
            {{-- {{$d_admin->college }} --}}
        </div>
    </div>
</div>
<div id="requests" class="container" style="min-height:100vh;">
    <div class="row">
        <div class="col-8">
            {{-- @auth('d_admin') --}}
            {{-- @can('update',$d_admin->d_admin_profile) --}}
            {{-- @can('view',$d_admin->d_admin_profile) --}}
            <div class="container-fluid">
                <!-- USER DATA-->
                <div class="user-data m-b-40">
                    <h3 class="title-3 m-b-30">
                        @if (!($unverified_c_admin->isEmpty()))
                        <i class="zmdi zmdi-account-calendar"></i>Directorate verification list</h3>
                    <div class="filters m-b-45">
                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>NAME</td>
                                        <td>COLLEGE</td>
                                        <td>EMAIL</td>
                                        <td>DATE</td>
                                    </tr>
                                </thead>
                                @endif
                                <tbody>
                                    @forelse ($unverified_c_admin as $c_admin)
                                    <tr>
                                        <td>
                                            <div class="table-data__info">
                                                <a href="{{$d_admin->id}}/view/{{$c_admin->id}}">{{$c_admin->name}}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="COLLEGE">{{$c_admin->college}}</span>
                                        </td>
                                        <td>
                                            <div class="rs-select2--trans rs-select2--sm">
                                                <span>
                                                    <a href="#">{{$c_admin->email}}</a>
                                                </span>

                                            </div>
                                        </td>
                                        <td>
                                            <span class="DATE">{{$c_admin->updated_at}}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-success">
                                        there are no unverified college admins
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class='col-12 d-flex justify-content-centre'>
                                {{$unverified_c_admin->links()}}
                            </div>
                            {{-- @endcan
                            @endcan
                            @endauth --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection