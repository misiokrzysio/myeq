@extends('layouts.layout')
@section('content')
<h1>{{ Auth::user()->name }}'s items</h1>
<div id="msg" class="text-danger">{{ session('msg') }}</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Producer</th>
      <th scope="col">Name</th>
      <th scope="col">Equip?</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    @foreach($equipment as $item)
      <tr><th scope="row">{{ $item->id }}</th><td>{{ $item->item->category }}</td><td>{{ strtoupper($item->item->producer) }}</td><td>{{ $item->item->name }}</td><td>{{ $item->state ? 'yes': 'no'}}</td>
        <td>
          <form method="POST" action="/equip/{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">X</button>
          </form>
          <form method="POST" action="/equipment/equip/{{ $item->id }}/{{ $item->state ? 0: 1}}">
            @csrf
            <button type="submit" class="btn btn-warning">{{ $item->state ? 'unequip': 'equip'}}</button>
          </form>
          <button type="button" id="buttonModal-{{ $item->id }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal-{{ $item->id }}">
            RATE &star;
          </button>
          <div class="modal fade" id="ratingModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ratingModal-{{ $item->id }}-title">Add rate for {{$item->item->name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="ratingModal-{{ $item->id }}">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="/rating/add/{{ $item->item->id }}">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="grade">How are you satisfied for using this product? (Only for today, or time from you last said it)</label>
                      <select class="form-control" id="grade" name="grade">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="description">Do you want say something? <span class="text-warning">This is not required.</span></label>
                      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="ratingModal-{{ $item->id }}">Close</button>
                    <button type="submit" class="btn btn-success">Add rate</button>
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

$('#ratingModal').on('shown.bs.modal', function () {
  $('#buttonModal').trigger('focus')
})
</script>
@endsection
