@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('imagenews.update',$data->id)}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class=" col-12">
                <label for="formGroupExampleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                    placeholder="Example input placeholder" value="{{$data->title}}">
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Photo</label>

                    <input type="file" class="dropify" data-height="200" name="image" />
                    <img src="{{$data->image}}" alt="" style="float: right" class="card-img-bottom" width="200" height="200">
                </div>
            </div>

            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" value="{{$data->date}}" placeholder="isi kan tanggal pembuatan" name="date" />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection