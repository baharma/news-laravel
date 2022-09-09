@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('category.update',$category->id)}}" class="card mt-4 m-3">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
      <label for="exampleInputEmail1" class="form-label">Title category News</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$category->title}}" aria-describedby="emailHelp">
      <div class="form-text">Silahkan masukan category</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection