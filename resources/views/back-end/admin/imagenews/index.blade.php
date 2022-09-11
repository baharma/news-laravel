@extends('back-end.layout.app')
@section('content')
<div class="row row-xs">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('imagenews.create')}}" class="btn btn-primary"> Add Data Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col"width="50%">Title</th>
                            <th scope="col"width="50%">Image</th>
                            <th scope="col"width="50%">Date</th>
                            <th scope="col" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach ($item as $items)  
                        <?php $i++ ?>
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$items->title}}</td>
                            <td>{{$items->date}}</td>
                            <td style="display:flex ">
                                <a href="{{route('category.edit',$items->id)}}" class="m-1 btn btn-info">
                                    <i class="fa fa-pencil-alt">Edit</i>
                                </a>
                                <form method="POST" class="m-1" action="{{route('category.destroy', $items->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" data-id="{{$items->id}}" class="btn btn-danger delete-item" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash">Delete</i></button>
                                </form>
                            </td>
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