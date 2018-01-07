@extends('admin.master')

@section('mainContent')

    <!-- Example DataTables Card-->
    @if(Session::get('msg'))
        <div class="alert {{ Session::get('status') == true ? 'alert-success' : 'alert-danger' }} col-sm-4 col-sm-offset-4">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('msg') }}
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Category List</div>
        <div class="card-body">
            <div class="table-responsive">
                {{--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead  class="text-center">
                    <tr>
                        <th>SL.</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Category Status</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody  class="text-center">
                    <?php
                        $i=0;
                    ?>
                    @foreach ($categories as $category)
                    <tr >
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->catName }}</td>
                        <td>{{ $category->catDesc }}</td>
                        <td>{{ $category->catStatus == 1 ? 'Published' : 'UnPublished' }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a href="{{ url('/del-category/'.$category->id) }}">Del</a> |<a href="{{ url('/edit-category/'.$category->id) }}">Edit</a></td>
                    </tr>
                    @endforeach




                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

@endsection