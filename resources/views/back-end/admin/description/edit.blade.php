@extends('back-end.layout.app')
@section('page_name','Descriptsion')
@section('content')
<form method="POST" action="{{route('descriptsion.update',$descripsion->id)}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class=" col-12">
                <label for="formGroupExampleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                    placeholder="masukan title" value="{{$descripsion->title}}">
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="">descripsions</label>
                    <textarea type="text" class="form-control" id="" name="description"
                    placeholder="Tulis lah teks masimal 9999 teks" rows="40">{{$descripsion->description}}</textarea>
                </div>
            </div>

            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" placeholder="isi kan tanggal pembuatan" name="date" 
                value="{{$descripsion->date}}" readonly
                />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection