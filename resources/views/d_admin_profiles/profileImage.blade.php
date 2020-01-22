@section('image')
@auth('d_admin')
    <a href="{{route('d_admin_profile.show', ['d_admin'=> auth()->user()->id])}}">
      <img src="{{  Auth::user()->d_admin_profile->profileImage() }}" style ='width: 40px;' class="rounded-circle">
    </a>
@endauth
    
@endsection