@extends('layouts.layout')
@section('content')
<h1>item</h1>
<ul>
  <li>create an item</li>
</ul>
<form method="POST" action="/items">
  @csrf
  <div class="row mb-3">
    <label for="producer">Producer</label>
    <select class="form-select" id="producer" name="producer">
     <option value="apple" selected>Apple</option>
     <option value="1">One</option>
     <option value="2">Two</option>
     <option value="3">Three</option>
    </select>
  </div>
  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="name" name="name">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Category</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="gridRadios1" value="gsm" checked>
        <label class="form-check-label" for="gridRadios1">
          gsm
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="gridRadios2" value="option2">
        <label class="form-check-label" for="gridRadios2">
          Second radio
        </label>
      </div>
      <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="category" id="gridRadios3" value="option3" disabled>
        <label class="form-check-label" for="gridRadios3">
          Third disabled radio
        </label>
      </div>
    </div>
  </fieldset>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
