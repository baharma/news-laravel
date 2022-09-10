@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('category.store')}}" class="card mt-4 m-3">
    @csrf
    <div class="mb-3 card-body">
      <label for="exampleInputEmail1" class="form-label">Title category News</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter Name">
      <div class="form-text">Silahkan masukan category</div>

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
