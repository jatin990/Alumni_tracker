@extends('layouts.app')


@section('content')
@auth('c_admin')
<button
    type="button"
    class="btn btn-link btn-sm"
    data-toggle="modal"
    data-target="#Addnewevent"
>Add new event
</button>
<div
    class="modal fade"
    id="Addnewevent"
    tabindex="-1"
    role="form"
    aria-labelledby="event"
    aria-hidden="true"
>
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="event">Event detail</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="{{route('events.add',['c_admin' =>auth()->user()->id])}}" method="post">
                       @csrf
                       @method('patch')
                    <div class="form-group">
                        <label for="title" class="col-form-label"
                            > title:</label
                        >
                        <input
                            type='text'
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            id="title"
                            name="title"
                            placeholder="title"
                            required
                        >
                         @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label"
                            > description:</label
                        >
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            value="{{ old('description') }}"
                            name="description"
                            placeholder="description"
                            required
                        ></textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                     <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
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

{{-- for directorate --}}
@auth('d_admin')
<button
    type="button"
    class="btn btn-link btn-sm"
    data-toggle="modal"
    data-target="#AddnewDevent"
>Add new event
</button>
<div
    class="modal fade"
    id="AddnewDevent"
    tabindex="-1"
    role="form"
    aria-labelledby="event"
    aria-hidden="true"
>
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="event">Event detail</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="{{route('dir_events.add',['d_admin' =>auth()->user()->id])}}" method="post">
                       @csrf
                       @method('patch')
                    <div class="form-group">
                        <label for="title" class="col-form-label"
                            > title:</label
                        >
                        <input
                            type='text'
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            id="title"
                            name="title"
                            placeholder="title"
                            required
                        >
                         @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label"
                            > description:</label
                        >
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            value="{{ old('description') }}"
                            name="description"
                            placeholder="description"
                            required
                        ></textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                     <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
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
@forelse ($events as $event)
    <li>{{$event->title}}</li>
    <li>{{$event->description}}</li>
@empty
    there are no relevant events happening 
@endforelse
@endsection