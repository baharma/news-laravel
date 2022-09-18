@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('thumnail.update',$data->id)}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class="form-group col-12">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="newslatter_id">
                    <option value="">
                        {{$newslatterid->id}}
                    </option>
                    @foreach($newslatter as $datas)
       
                    <option value="{{ $datas->id}}">
                        {{$datas->title}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" class="dropify" data-height="200" name="image" />
                </div>
            </div>

            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" placeholder="isi kan tanggal pembuatan" name="date" />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection