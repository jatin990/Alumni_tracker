@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="">{{ __('Register') }}</div>

            <div class="form-style">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="college" class="col-md-4 col-form-label text-md-right">{{ __('College') }}</label>

                        <div class="col-md-6">
                            <select name="college" value="{{ old('college') }}"
                                class="form-control @error('college') is-invalid @enderror" required>
                                <option value="college 1">college 1</option>
                                <option value="college 2">college 2</option>
                                <option value="college 3">college 3</option>
                                <option value="college 4">college 4</option>
                            </select>

                            @error('college')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <select name="year" value="{{ old('year') }}"
                                class="form-control @error('year') is-invalid @enderror" required>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                        <div class="col-md-6">
                            <select name="branch" value="{{ old('branch') }}"
                                class="form-control @error('branch') is-invalid @enderror" autofocus required>
                                <option value=""></option>
                                <option value="cse">cse</option>
                                <option value="ece">ece</option>
                                <option value="mechanical">mechanical</option>
                                <option value="electrical">electrical</option>
                                <option value="IT">IT</option>
                            </select>
                            @error('branch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_no"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contact no') }}</label>

                        <div class="col-md-6">
                            <input id="phone_no" type="tel"
                                class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                value="{{ old('phone_no') }}" required autocomplete="phone_no">

                            @error('phone_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dateOfBirth"
                            class="col-md-4 col-form-label text-md-right">{{ __('Date-of-birth') }}</label>

                        <div class="col-md-6">
                            <input id="dateOfBirth" type="date"
                                class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth"
                                value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth">

                            @error('dateOfBirth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection