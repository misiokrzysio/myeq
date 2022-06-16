@extends('layouts.layout')
@section('content')
<h1>reviews</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Producer</th>
      <th scope="col">Name</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
      <tr><th>test</th></tr>
      <tr>
        <td>{{ $review->text }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
