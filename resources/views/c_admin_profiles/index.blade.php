@extends('layouts.app') @section('content')
<div class="container">
    <h4>College ADMIN Dashboard</h4>
    <div class="row mt-5">
        <div class="col-2">
            <img src="{{ $c_admin->c_admin_profile->profileImage() }}" class="rounded-circle w-100" />
            <h4 class="ml-5">{{$c_admin->name}}</h4>
        </div>
        <div class="col-4">
            <p>A leading expert in interactive and creative design.</p>
        </div>
        <div class="col-2">
            @auth('c_admin') @can('update',
            $c_admin->c_admin_profile)
            <a href="/c_admin_profile/{{ $c_admin->id }}/edit">Edit Profile</a>
            @endcan @endauth
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="font-weight-bold">
                {{$c_admin->c_admin_profile->url}}
                {{$c_admin->college}}
            </div>
        </div>
        <div class="col-2  ">
            @auth('c_admin') @can('update',
            $c_admin->c_admin_profile)

            @can('view',$c_admin->c_admin_profile)
            <a href="/c_admin_profile/{{ $c_admin->id }}/events">add event</a>



            @forelse ($unverified_alumni as $admin)
            <div>
                <a href="{{$c_admin->id}}/view/{{$admin->id}}">{{$admin->name}}</a>
            </div>
            @empty
            <div class="alert alert-success">
                there are no unverified alumni
            </div>

            @endforelse
            <div class='col-12 d-flex justify-content-centre'>
                {{$unverified_alumni->links()}}
            </div>
            @endcan @endcan @endauth
        </div>
    </div>

    @if(($c_admin->c_admin_profile->rejected ===1) && (auth()->user()->c_admin_profile==$c_admin->c_admin_profile))
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
        </>

        @elseif($c_admin->c_admin_profile->verified !==1)
        <div class="alert alert-danger">
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
            @endauth
            @endif
        </div>
    </div>


</div>

@endsection
</div>