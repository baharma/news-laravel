@extends('back-end.layout.app')
@section('content')
<form method="POST" action="{{route('thumnail.update',$item->id)}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class="form-group col-12">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="title_news">
                    <option value="{{$newsid->id}}">{{$newsid->title}}</option>
                    @foreach($allNews as $datas)
                    <option value="{{ $datas->id}}">
                        {{$datas->title}}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Photo</label>
                    <img src="{{$item->image}}" alt="" style="float: right" class="card-img-bottom" width="200" height="200">
                    <input type="file" class="dropify" data-height="200" name="image" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">descripsions</label>
                    <textarea type="text" class="form-control" id="" name="descripsion"
                        placeholder="Tulis lah teks masimal 9999 teks" rows="4">{{$item->descripsion}}</textarea>
                </div>
            </div>
            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" 
                placeholder="isi kan tanggal pembuatan" name="date" value="{{$item->date}}" />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection