@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @foreach($reviews as $review)
            <div class="card mb-2">
                <div class="card-header">
                  {{ $review->item->name }}
                </div>
                <div class="card-body">
                  {!! $review->text !!}
                </div>
                <div class="card-footer small">
                  {{ $review->created_at }}
                </div>
            </div>
          @endforeach
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">Latest news</div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Latest registered: {{$latest_user->name}}</li>
              <li class="list-group-item">Latest added item: {{$latest_item->name}}</li>
              <li class="list-group-item">Latest added rating: {{$latest_rating->grade}} for {{$latest_rating->item->name}}</li>
              <li class="list-group-item">Latest added review: {{$reviews->first()->item->name}}</li>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
