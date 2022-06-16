@extends('layouts.layout')
@section('content')
<h1>items</h1>
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
    @foreach($items as $item)
      <tr><th scope="row">{{ $item->id }}</th><td>{{ $item->category }}</td><td>{{ strtoupper($item->producer) }}</td><td>{{ $item->name }}</td>
        <td>
          <form method="POST" action="/item/{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">X</button>
          </form>
          <form method="POST" action="/equipment/add/{{ $item->id }}">
            @csrf
            <button type="submit" class="btn btn-success">+</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
