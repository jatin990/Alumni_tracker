@section('image')
@auth('web')
    <a href="{{route('profile.show', ['user'=> auth()->user()->id])}}">
     <img src="{{  Auth::user()->profile->profileImage() }}" style ='width: 40px;' class="rounded-circle ">
    </a>
@endauth
@auth('c_admin')
     <a href="{{route('c_admin_profile.show', ['c_admin'=> auth()->user()->id])}}">
       <img src="{{  Auth::user()->c_admin_profile->profileImage() }}" style ='width: 40px;' class="rounded-circle">
    </a>
@endauth
    
@endsection