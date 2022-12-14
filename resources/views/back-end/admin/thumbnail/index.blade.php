@extends('back-end.layout.app')
@section('page_name','Thumnail')
@section('content')
<div class="row row-xs">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('thumnail.create')}}" class="btn btn-primary"> Add Data Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col" >descripsion</th>
                            <th scope="col">Date</th>
                            <th scope="col" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach ($data as $items)  
                        <?php $i++ ?>
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$items->newsLatter_id->title}}</td>
                            <td><img src="{{$items->image}}" alt=""></td>
                            <td>{{$items->descripsion}}</td>
                            <td>{{$items->date}}</td>
                            <td style="display:flex ">
                                <a href="{{route('thumnail.edit',$items->id)}}" class="m-1 btn btn-info">
                                    <i class="fa fa-pencil-alt">Edit</i>
                                </a>
                                <form method="POST" class="m-1" action="{{route('thumnail.destroy', $items->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" data-id="{{$items->id}}" class="btn btn-danger delete-item" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash">Delete</i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection