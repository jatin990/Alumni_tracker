@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class='col-12 offset-2'>
            {{$events->links()}}
        </div>
    </div>

    <div class="row">
        <div class="col-9 offset-1">
            @forelse ($events as $event)
            <blockquote
                class="list-group-item list-group-flush font-weight-bold text-left shadow border-bottom-0 m-0 btn"
                data-toggle="modal" data-target="#event_{{$event->id}}">
                {{$event->title}}
                <footer class="blockquote-footer text-right">
                    <cite>
                        Added by
                        @if($event->level==1) directorate
                        @else college
                        @endif
                        {{$event->created_at}}
                    </cite>
                </footer>
            </blockquote>

            <div class="modal fadein" id="event_{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="event"
                aria-hidden="true">
                <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="event_{{$event->id}}">Event details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="modal-header font-weight-bold ">
                                {{$event->title}}
                            </div>
                            <div class="font-weight-light">
                                {{$event->description}}
                            </div>
                            <div class="time">

                            </div>

                            <div class="modal-footer">
                                <div class="ml-3">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="container d-flex m-auto font-weight-bold">
                No relevant events found
            </div>
        </div>
        @endforelse
    </div>


    <div class="col-2">
        @auth('c_admin')
        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#Addnewevent">
            Add new event
        </button>
        <div class="modal fadein" id="Addnewevent" tabindex="-1" role="form" aria-labelledby="event" aria-hidden="true">
            <div class="modal-dialog" role="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="event">Event detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('events.add',['c_admin' =>auth()->user()->id])}}" method="post">
                            @csrf @method('patch')
                            <div class="form-group">
                                <label for="title" class="col-form-label">
                                    title:</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" id="title" name="title" placeholder="title" required />
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">
                                    description:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" value="{{ old('description') }}" name="description"
                                    placeholder="description" required></textarea>
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
    </div>
    {{-- @endcan --}}
    @endauth

    {{-- for directorate --}}
    @auth('d_admin')
    @forelse ($events as $event)
    <li>{{$event->title}}</li>

    <li>{{$event->description}}</li>
    @empty
    there are no relevant events happening
    @endforelse
    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#AddnewDevent">
        Add new event
    </button>
    <div class="modal fade" id="AddnewDevent" tabindex="-1" role="form" aria-labelledby="event" aria-hidden="true">
        <div class="modal-dialog" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="event">Event detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('dir_events.add',['d_admin' =>auth()->user()->id])}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="title" class="col-form-label">
                                title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" id="title" name="title" placeholder="title" required />
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">
                                description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                value="{{ old('description') }}" name="description" placeholder="description"
                                required></textarea>
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
</div>
</div>
</div>
@endsection