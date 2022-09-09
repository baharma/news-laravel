@extends('back-end.layout.app')
@section('content')
<div class="row row-xs">
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('category.create')}}" class="btn btn-primary"> Add Data Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach ($item as $items)  
                        <?php $i++ ?>
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$items->title}}</td>
                            <td>
                                <a href="{{route('category.edit',$items->id)}}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt">Edit</i>
                                </a>
                                <form action="{{route('category.destroy',$items->id)}}" method="post" class="d-inline" >
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection