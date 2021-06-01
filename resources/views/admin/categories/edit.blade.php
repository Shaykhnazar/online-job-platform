@extends('layouts.admin')
@section('content')

        <div class="container-fluid p-5 ">
			<h4 class="pb-2 pl-2" style="text-align: center;">Edit Category Information</h4>
			<a class='m-2' href='{{ route('categories.index') }}' style="color: blue; text-decoration: underline;"> View all</a>
			<form action="{{ route('categories.update', $category->category_id) }}" method="post" class="card p-4 m-2 p-4 mb-5" style='background-color: rgb(253, 253, 253); border:none; border-radius: 1% '>
			  @csrf
                @method('PUT')
			  <div class="form-row">
			  	<div class="form-group col-md-1">
				    <label>ID</label>
				    <p class="form-control">{{$category->category_id}}</p>
			  	</div>
			    <div class="form-group col-md-4">
				    <label>Category Name</label>
				    <input type="text" class="form-control"  name="category_name" value="{{$category->category_name}}">
			  	</div>
			    <div class="form-group col-md-2">
			      <label>Featured</label>
                    <select name="featured" class="form-control">
                        <option value="1" {{ ($category->featured) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ (!$category->featured) ? 'selected' : '' }}>No</option>
                    </select>
                </div>
			    <div class="form-group col-md-2">
			      <label>&nbsp;</label>
			      <button type="submit" class=" form-control btn btn-primary font-weight-bold">Update</button>
			    </div>
			  </div>
			</form>
		</div>

@endsection
