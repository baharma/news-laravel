@extends('back-end.layout.app')
@section('page_name','Newslatter')
@section('content')
<div class="row row-xs">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('newslatter.create')}}" class="btn btn-primary"> Add Data Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col" >Category</th>
                            <th scope="col" >Date</th>
                            <th scope="col" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach ($item as $items)  
                        <?php $i++ ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$items->title}}</td>
                            <td><img src="{{$items->image_event->image}}" alt=""></td>
                            <td>{{$items->descripsion_event->description}}</td>
                            <td>{{$items->category_event->title}}</td>
                            <td>{{$items->date}}</td>
                            <td>                                <a href="{{route('newslatter.edit',$items->id)}}" class="m-1 btn btn-info">
                                <i class="fa fa-pencil-alt">Edit</i>
                            </a>
                            <form method="POST" class="m-1" action="{{route('newslatter.destroy', $items->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" data-id="{{$items->id}}" class="btn btn-danger delete-item" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash">Delete</i></button>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $item->links() }}
            </div>
        </div>
    </div>
</div>
@endsection