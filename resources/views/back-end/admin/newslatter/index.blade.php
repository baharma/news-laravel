@extends('back-end.layout.app')
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
                            <th scope="col"width="30%">Title</th>
                            <th scope="col"width="30%">Image</th>
                            <th scope="col"width="30%">Description</th>
                            <th scope="col" width="30%">Category</th>
                            <th scope="col" width="30%">Date</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    
                </table>
            
            </div>
        </div>
    </div>
</div>
@endsection