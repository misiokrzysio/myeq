@extends('layouts.layout')
@section('content')
<script src="https://cdn.tiny.cloud/1/74xqu8s4j4ujij8myb1jrb1ee0vonrjbi8j68d03rf3f6swk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<h1>{{ Auth::user()->name }}'s reviews</h1>
<div id="msg" class="text-danger">{{ session('msg') }}</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
      <tr><th scope="row">{{ $review->id }}</th><td>{{ $review->item->name }}</td>
        <td>
          <button type="button" class="btn btn-success">
            Publish
          </button>
          <button type="button" id="buttonModal-{{ $review->id }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $review->id }}">
            Edit
          </button>
          <div class="modal fade" id="reviewModal-{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="reviewModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reviewModal-{{ $review->id }}-title">Edit review for {{$review->item->name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="reviewModal-{{ $review->id }}">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="/review/edit/{{ $review->id }}">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="text">Your review, your voice</label>
                      <textarea class="form-control" id="text" name="text" rows="12">{!! $review->text !!}</textarea>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="reviewModal-{{ $review->id }}">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
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
