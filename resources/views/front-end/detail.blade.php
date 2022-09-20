@extends('layouts.fornapp')

@section('content')
<div class="card mt-2" >
    <img src="{{$image->image}}" class="card-img-top" alt="Chicago Skyscrapers" style="max-height: 500px;" />
    <div class="card-body">
      <h5 class="card-title">{{$data->title}}</h5>
      
    </div>
    <ul class="list-group list-group-light list-group-small">
      <li class="list-group-item px-4">
        <p class="card-text">{{$Descripsions->description}}</p>
      </li>
    </ul>
    <div class="card-body">
        <p class="card-text"> {{$data->date}}</p>
    </div>
  </div>
@endsection