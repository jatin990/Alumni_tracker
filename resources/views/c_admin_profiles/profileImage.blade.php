@section('image')
@auth('c_admin')
     <a href="{{route('c_admin_profile.show', ['c_admin'=> auth()->user()->id])}}">
       <img src="{{  Auth::user()->c_admin_profile->profileImage() }}" style ='width: 40px;' class="rounded-circle">
    </a>
@endauth
   @auth('d_admin')
    <a href="{{route('d_admin_profile.show', ['d_admin'=> auth()->user()->id])}}">
      <img src="{{  Auth::user()->d_admin_profile->profileImage() }}" style ='width: 40px;' class="rounded-circle">
    </a>
@endauth
@endsection