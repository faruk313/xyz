@extends('admin.master')



@section('mainContent')

	{{--{{ Session::get('msg') }}--}}


	{!! Form::open(['url' => '/save-category','method'=>'POST','class'=>'form-horizontal']) !!}
    @if(Session::get('msg'))
        <div class="alert alert-success col-sm-4 col-sm-offset-4">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> {{ Session::get('msg') }}
        </div>
    @endif

    <div class="form-group">
      <label class="control-label col-sm-4 col-sm-offset-4" for="catName">Category Name:</label>
      <div class="col-sm-4 col-sm-offset-4">
        <input type="text" class="form-control" id="email" placeholder="Enter Category Name" name="categoryName" value="{{ old('categoryName') }}">
          {{--@if($errors->has('categoryName'))--}}
              {{--<p>{{ $errors->first('categoryName') }}</p>--}}
          {{--@endif--}}

          @if($errors->has('categoryName'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Error!</strong> {{ $errors->first('categoryName') }}
              </div>
          @endif
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-4 col-sm-offset-4" for="catDesc">Category Description:</label>
      <div class="col-sm-4 col-sm-offset-4">
      	<textarea name="categoryDescription" id="catDesc"  rows="5" placeholder="Write About Category.." style="min-width: 100%"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-sm-offset-4" for="catStatus">Category Status:</label>
      <div class="col-sm-4 col-sm-offset-4">
      	<select class="form-control" name="categoryStatus" id="catStatus">
      		<option value="">Select Status</option>
      		<option value="1">Published</option>
      		<option value="0">UnPublished</option>
      	</select>
          @if($errors->has('categoryStatus'))
              {{--<p>{{ $errors->first('categoryStatus') }}</p>--}}

              @if($errors->has('categoryStatus'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong>Error!</strong> {{ $errors->first('categoryStatus') }}
                  </div>
              @endif
          @endif
      </div>
    </div>
 
 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" class="btn btn-success">Submit</button> <button type="reset" class="btn btn-danger  pull-right">Reset</button>
      </div>
     
    
    </div>
  

    {!! Form::close() !!}
  

@endsection