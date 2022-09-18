@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('newslatter.update',$data->id)}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class=" col-12">
                <label for="formGroupExampleInput" class="form-label">Title</label>
                <input type="text" value="{{$data->title}}" class="form-control" id="formGroupExampleInput" name="title"
                    placeholder="Example input placeholder">
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Photo</label>
                    <img src="{{$image->image}}" alt="" style="float: right" class="card-img-bottom" width="200" height="200">
                    <input type="file" class="dropify" data-height="200" name="image_id" />
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="">descripsions</label>
                    <textarea type="text" class="form-control" id="" name="description_id"
                        placeholder="Tulis lah teks masimal 9999 teks" rows="40">{{$Descripsions->description}}</textarea>
                </div>
            </div>

            <div class="form-group col-12">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @foreach($categorydata as $dataq)
                    <option value="{{ $dataq->id}}">
                        {{$dataq->title}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class=" col-12">
                <label for="formGroupExampleInput" class="form-label">Nama Anda</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="users"
                    placeholder="Example input placeholder" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" 
                placeholder="isi kan tanggal pembuatan" name="date" value="{{$data->date}}" />
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary m-4">Submit</button>
</form>
@endsection