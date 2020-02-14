@extends('layouts.app')
@section('content')
<div id="intro" class="container " style="background-color: #fff;">
  @if(($user->profile->rejected ===1 )&& (auth()->user()->profile==$user->profile))
  <div class="alert alert-danger">Your profile was rejected by the admins!! provide or edit some extra info for
    better recognition
  </div>
  <button type="button" class="btn btn-sm btm-secondary font-weight-bold" data-toggle="modal" data-target="#feedback">
    View feedback
  </button>
  <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedbackuser" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="feedbackuser"> Feedback</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning font-weight-light">
            {{$user->profile->feedback}}
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

  @elseif($user->profile->verified !==1)
  <div class="alert alert-light mb-1 pb-1">profile is not verified</div>

  @auth('c_admin')
  <form action="{{route('profile.verify',['c_admin'=>auth()->user()->id,'user'=>$user->id,])}}" method="post">
    @csrf
    @method('PATCH')
    <button class="btn btn-primary">verify</button>
  </form>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyalumni">reject
  </button>
  <div class="modal fade" id="verifyalumni" tabindex="-1" role="form" aria-labelledby="verify" aria-hidden="true">
    <div class="modal-dialog" role="form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="verify">Do you want to provide some feedback</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('profile.reject',['c_admin'=>auth()->user()->id,'user'=>$user->id,])}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="feedback" class="col-form-label"> Message:</label>
              <textarea class="form-control" id="feedback" name="feedback" placeholder="optional"></textarea>
            </div>


            <div class="modal-footer">
              <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('submit') }}
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
  <div class="row justify-content-between">
    <div class="col-md-4">
      <div class="border mt-2">
        <img src="{{ $user->profile->profileImage() }}" class='img-responsive'
          style="max-width:22rem; max-height:22rem">
      </div>
    </div>
    <div class="col-md-7 offset-1">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
          <h2><span>About myself</span></h2>
          @auth('web')
          @can('update', $user->profile)
          <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
          @endcan
          @endauth
        </div>

        <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nobis recusandae
          molestias ducimus odio, officia, assumenda dolor debitis, in vitae omnis consectetur animi! Tempora
          mollitia
          atque corporis exercitationem placeat debitis. </p>


        <p class="text-left h2">Info</p>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="h5 col-6 pb-0 mb-0">
              {{$user->college }}
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>Name</label>
            </div>
            <div class="col-6">
              <p>{{$user->name}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>Email</label>
            </div>
            <div class="col-6">
              <p><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>Date-of-Birth</label>
            </div>
            <div class="col-6">
              <p>{{$user->dateOfBirth ?? 'n/a'}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>Phone</label>
            </div>
            <div class="col-6">
              <p><a href="tel://{{$user->phone_no}}">{{$user->phone_no}}</a></p>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>linkedIn</label>
            </div>
            <div class="col-6">
              <a href="{{$user->profile->url }}">{{$user->profile->url ?? 'n/a'}}</a>
            </div>
          </div>

          <div class="row mt-1">
            <div class="col-6">
              <label class='font-weight-bold'>Current Location</label>
            </div>
            <div class="col-6">
              <p>{{$user->profile->location ?? 'n/a'}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>Profession</label>
            </div>
            <div class="col-6">
              <p>{{$user->profile->job ?? 'n/a'}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label class='font-weight-bold'>status</label>
            </div>
            <div class="col-6">
              <p>{{$user->profile->status ?? 'n/a' }}</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>



  @endsection