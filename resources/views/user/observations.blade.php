@extends('layouts.layout')
@section('content')
<div id="msg" class="text-danger">{{ session('msg') }}</div>
<div class="row gutters-sm">
  @foreach($observations as $observation)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
            <div class="mt-3">
              <h4>{{ $observation->watched->name }}</h4>
              <p class="text-secondary mb-1">Full Stack Developer</p>
              <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
              <div class="row">
                <div class="col-6">
                  <a href="{{ route('user.profile', $observation->watched_id) }}" class="btn btn-primary">Profile</a>
                </div>
                <div class="col-6">
                  @if($observations->where('follower_id', Auth::id())->count() < 1 AND $observation->watched_id != Auth::id())
                    <form method="post" action="{{ route('observation.add', $observation->watched_id) }}">
                      @csrf
                      <button type="submit" class="btn btn-success">Follow</button>
                    </form>
                  @elseif($observation->watched_id != Auth::id())
                    <form method="post" action="{{ route('observation.destroy', $observation->watched_id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Unfollow</button>
                    </form>
                  @endif
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
