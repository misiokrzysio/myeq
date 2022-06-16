@extends('layouts.layout')
@section('content')
<h1>item</h1>
<div id="msg" class="alert alert-info">{{ session('msg') }}</div>
<ul>
  <li>{{ $item->name }}</li>
  <li>Avg grades: {{ $item->ratings->avg('grade') }} from {{ $item->ratings->count() }} daily ratings</li>
</ul>
<button class="btn btn-success btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRatings" aria-expanded="false" aria-controls="collapseRatings">
    Daily ratings with comments
</button>
<div class="collapse mt-4" id="collapseRatings">
  <div class="row">
    @foreach ($item->ratings->where('description', '<>', '') as $rating)
    <div class="col-sm-3">
      <div class="card text-center">
        <div class="card-header">
          Daily rate - {{ $rating->grade }}
        </div>
        <div class="card-body">
          <p class="card-text">{{ $rating->description }}</p>
        </div>
        <div class="card-footer text-muted">
          {{ $rating->created_at }} - {{ $rating->user->name }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
