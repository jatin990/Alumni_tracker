@extends('layouts.app') @section('content')
<div id='intro' class="container">
    @if(($c_admin->c_admin_profile->rejected ===1) &&
    (auth()->user()->c_admin_profile==$c_admin->c_admin_profile))
    <div class="alert alert-danger">
        Your c_admin_profile was rejected by the admins!!
        provide or edit some extra info for better recognition
    </div>
    <button type="button" class="btn btn-sm btm-secondary font-weight-bold" data-toggle="modal" data-target="#feedback">
        feedback
    </button>
    <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedbackuser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackuser">
                        Feedback
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning font-weight-light">
                        {{$c_admin->c_admin_profile->feedback}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    @elseif($c_admin->c_admin_profile->verified !==1)
    <div class="alert alert-light">
        <p>the c_admin is not verified</p>
    </div>

    @auth('d_admin')
    <form action="{{route('c_admin_profile.verify',['d_admin'=>auth()->user()->id,'c_admin'=>$c_admin->id,])}}"
        method="post">
        @csrf @method('PATCH')
        <button class="btn btn-primary">verify</button>
    </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyalumni">
        reject
    </button>
    <div class="modal fade" id="verifyalumni" tabindex="-1" role="form" aria-labelledby="verify" aria-hidden="true">
        <div class="modal-dialog" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verify">
                        Do you want to provide some feedback
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form
                        action="{{route('c_admin_profile.reject',['d_admin'=>auth()->user()->id,'c_admin'=>$c_admin->id,])}}"
                        method="post">
                        @csrf @method('PATCH')
                        <div class="form-group">
                            <label for="feedback" class="col-form-label">
                                Message:</label>
                            <textarea class="form-control" id="feedback" name="feedback"
                                placeholder="optional"></textarea>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("submit") }}
                                    </button>
                                </div>
                            </div>
                            <div class="ml-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @endif

    <div class="row mt-5 justify-content-between " style="min-height:100vh;">
        <div class="col-md-4">
            <div class="border">
                <img src="{{ $c_admin->c_admin_profile->profileImage() }}" class="img-responsive"
                    style="max-width:22rem; max-height:22rem" />
            </div>
        </div>

        {{-- <h4 class="ml-5">{{$c_admin->name}}</h4> --}}


        <div class="col-md-7 offset-1 pt-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3>College staff Profile</h3>

                    @auth('c_admin')
                    @can('update',$c_admin->c_admin_profile)
                    <a href="/c_admin_profile/{{ $c_admin->id }}/edit">Edit Profile</a>
                    @endcan @endauth
                </div>
                <div class="h3">{{$c_admin->college }}</div>
                <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nobis recusandae
                    molestias ducimus odio, officia, assumenda dolor debitis, in vitae omnis consectetur animi! Tempora
                    mollitia
                    atque corporis exercitationem placeat debitis. </p>
                <p class="text-left h2">Info</p>
                <hr>
                <div class="" id="" role="" aria-labelledby="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$c_admin->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><a href="mailto:{{$c_admin->email}}">{{$c_admin->email}}</a></p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p><a href="tel://{{$c_admin->phone_no}}">{{$c_admin->phone_no}}</a></p>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-6">
                    <label>linkedIn</label>
                </div>
                <div class="col-md-6">
                    <a href="{{$c_admin->c_admin_profile->url }}">{{$c_admin->c_admin_profile->url ??'n/a'}}</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div id="requests" class="container" style="min-height:100vh;">
    <div class="row">
        <div class="col-8">
            @auth('c_admin') @can('update',$c_admin->c_admin_profile)
            @can('view',$c_admin->c_admin_profile)
            <div class="container-fluid">
                <!-- USER DATA-->
                <div class="user-data m-b-40">
                    <h3 class="title-3 m-b-30">
                        @if (!$unverified_alumni->isEmpty())
                        <i class="zmdi zmdi-account-calendar"></i>COLLEGE ADMIN VERIFICATION LIST</h3>
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
                                    @forelse ($unverified_alumni as $alumni)
                                    <tr>
                                        <td>
                                            <div class="table-data__info">
                                                <a href="{{$c_admin->id}}/view/{{$alumni->id}}">{{$alumni->name}}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="COLLEGE">{{$alumni->college}}</span>
                                        </td>
                                        <td>
                                            <div class="rs-select2--trans rs-select2--sm">
                                                <span>
                                                    <a href="#">{{$alumni->email}}</a>
                                                </span>

                                            </div>
                                        </td>
                                        <td>
                                            <span class="DATE">{{$alumni->updated_at}}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-success">
                                        there are no unverified alumni
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class='col-12 d-flex justify-content-centre'>
                                {{$unverified_alumni->links()}}
                            </div>
                            @endcan
                            @endcan
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection