@extends('back-end.userlatter.layout.app')
@section('page_name','Thumnail')
@section('content')
<form method="POST" action="{{route('thumNails.store')}}" class="card mt-4 m-3" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 card-body">
        <div class="row" style=" ">

            <div class="form-group col-12">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="title_news">
                    @foreach($item as $datas)
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
                <div class="form-group">
                    <label for="">descripsions</label>
                    <textarea type="text" class="form-control" id="" name="descripsion"
                        placeholder="Tulis lah teks masimal 9999 teks" rows="4"></textarea>
                </div>
            </div>
            <div class="col-12">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="text" class="date form-control" 
                placeholder="isi kan tanggal pembuatan" name="date" />
            </div>
            <div class=" col-12">

                <input type="hidden" class="form-control" id="formGroupExampleInput" name="users"
                    placeholder="Example input placeholder" value="   {{ Auth::user()->id }}" readonly>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection