@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row mt-4">
                    <label for="location"
                        class="col-md-4 col-form-label text-md-right">{{ __('Current location') }}</label>
                    <div class="col-md-6">
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" value="{{ old('location') }}" autocomplete="location">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label for="job"
                        class="col-md-4 col-form-label text-md-right">{{ __('Profession(if any)') }}</label>

                    <div class="col-md-6">
                        <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job"
                            value="{{ old('job') }}" autocomplete="job">

                        @error('job')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Current Status') }}</label>

                    <div class="col-md-6">
                        <input id="status" type="text" class="form-control @error('status') is-invalid @enderror"
                            name="status" value="{{ old('status') }}" autocomplete="status">

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="url" class="col-md-4 col-form-label text-md-right">LinkedIn id</label>
                    <div class="col-md-6">
                        <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                            name="url" value="{{ old('url') ?? $user->profile->url}}" autocomplete="url" autofocus>

                        @if ($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                    <div class="col-md-6">

                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="row mt-4 pt-4 offset-8">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection