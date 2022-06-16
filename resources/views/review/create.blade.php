@extends('layouts.layout')
@section('content')
<script src="https://cdn.tiny.cloud/1/74xqu8s4j4ujij8myb1jrb1ee0vonrjbi8j68d03rf3f6swk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<h1>item</h1>
<ul>
  <li>create an item</li>
</ul>
<form method="POST" action="{{ route('review.add') }}">
  @csrf
  <div class="row col-sm-4">
    <label for="producer">Item</label>
    <select class="form-select" id="item" name="item_id">
    @foreach(Auth::user()->equipments as $equipment)
      <option value="{{ $equipment->item_id }}" selected>{{ $equipment->item->producer }} {{ $equipment->item->name }}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="text">Your review, your voice</label>
    <textarea class="form-control" id="text" name="text" rows="12"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Send</button>
</form>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection
