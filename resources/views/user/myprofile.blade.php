@extends('layouts.layout')
@section('content')
<h1>This is your profile, {{ Auth::user()->name }}. You're welcome</h1>
<div id="msg" class="text-danger">{{ session('msg') }}</div>
<p>{{ Auth::user()->points }}</p>
<p>Your equip</p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($equipment as $item)
      <tr><th scope="row">{{ $item->id }}</th><td>{{ $item->item->category }}</td><td>{{ strtoupper($item->item->producer) }} {{ $item->item->name }}</td></tr>
    @endforeach
  </tbody>
</table>
@endsection
