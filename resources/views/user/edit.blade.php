@extends('layouts.layout')
@section('content')
<div id="msg" class="text-danger">{{ session('msg') }}</div>
@foreach($informations as $information)
  <form class="row">
    <div class="col-12">
      <label for="inputWebsite" class="form-label">Website</label>
      <input type="text" class="form-control" id="inputWebsite" name="website" value="{{ $information->website }}">
    </div>
    <div class="col-12">
      <label for="inputFacebook" class="form-label">Facebook</label>
      <input type="text" class="form-control" id="inputWebsite" name="website" value="{{ $information->website }}">
    </div>
    <div class="col-12">
      <label for="inputWebsite" class="form-label">Website</label>
      <input type="text" class="form-control" id="inputWebsite" name="website" value="{{ $information->website }}">
    </div>
    <div class="col-12">
      <label for="inputWebsite" class="form-label">Website</label>
      <input type="text" class="form-control" id="inputWebsite" name="website" value="{{ $information->website }}">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </form>
@endforeach
@endsection
