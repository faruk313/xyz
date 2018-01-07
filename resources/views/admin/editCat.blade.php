@extends('admin.master')



@section('mainContent')

	{{--{{ Session::get('msg') }}--}}
    <h2>Edit Category</h2>

	{!! Form::open(['url' => '/update-category','method'=>'POST','class'=>'form-horizontal','name'=>'editForms']) !!}


    <div class="form-group">
      <label class="control-label col-sm-4 col-sm-offset-4" for="catName">Edit Category Name:</label>
      <div class="col-sm-4 col-sm-offset-4">
        <input type="text" class="form-control" id="email" placeholder="Enter Category Name" name="categoryName" value="{{ $catID->catName }}">
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
      <label class="control-label col-sm-4 col-sm-offset-4" for="catDesc">Edit Category Description:</label>
      <div class="col-sm-4 col-sm-offset-4">
      	<textarea name="categoryDescription" id="catDesc"  rows="5" style="min-width: 100%">{{ $catID->catDesc }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 col-sm-offset-4" for="catStatus">Edit Category Status:</label>
      <div class="col-sm-4 col-sm-offset-4">
      	<select class="form-control" name="categoryStatus" id="catStatus">
      		<option>Select Status</option>
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
    <input type="hidden" name="catID" value="{{ $catID->id }}" >
 
 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" class="btn btn-success">Update</button> <button type="reset" class="btn btn-danger  pull-right">Reset</button>
      </div>
     
    
    </div>
  

    {!! Form::close() !!}

    <script>
        document.forms['editForms'].elements['categoryStatus'].value='{{ $catID->catStatus }}'

    </script>
  

@endsection