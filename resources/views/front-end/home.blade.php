@extends('layouts.fornapp')

@section('content')
<div class="card border mt-4" style="margin: auto;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://img.freepik.com/premium-vector/modern-minimal-found-error-icon-oops-page-found-404-error-page-found-with-concept_599740-716.jpg?w=2000"
                class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">More info </small></p>
            </div>
        </div>
    </div>
</div>


<div class="card mt-4">
    <div class="card-body">

        @foreach ($data as $items)
        <div class=" mb-3" style="max-width: 840px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{$items->image}}"
                        class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$items->newsLatter_id->title}}</h5>
                        <p class="card-text">{{$items->descripsion}}</p>
                        <p class="card-text"><small class="text-muted">{{$items->date}}</small></p>
                        <a href="/detail/{{$items->newsLatter_id->id}}" class="btn btn-primary">More News</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        {{ $data->links() }}
 
    </div>
   
</div>
@endsection