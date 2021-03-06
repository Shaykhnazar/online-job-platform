@extends('layouts.admin')
@section('content')

		<div class="container-fluid p-5 ">
			<h4 class="pb-2 pl-2" style="text-align: center;">Add New Skill</h4>
			<a class='m-2' href='{{ route("skills.index") }}' style="color: blue; text-decoration: underline;"> View all</a>
			<form action="{{ route("skills.store") }}" method="post" class="card p-4 m-2 p-4 mb-5" style='background-color: rgb(253, 253, 253); border:none; border-radius: 1% '>
			  @csrf
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label for="exampleFormControlInput1">Skill Name</label>
				    <input type="text" class="form-control"  name="name">
			  	</div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Featured</label>
                      <select class="form-control" name="featured">
                          <option value="1" selected>Yes</option>
                          <option value="0">No</option>
                      </select>
                  </div>
			    <div class="form-group col-md-2">
			      <label for="exampleFormControlInput1">&nbsp;</label>
			      <button type="submit" class=" form-control btn btn-primary font-weight-bold">Save</button>
			    </div>
			    <div class="form-group col-md-2">
			      <label for="exampleFormControlInput1">&nbsp;</label>
			      <a href="{{ route("skills.index") }}" class=" form-control btn btn-light font-weight-bold">Cancel</a>
			    </div>
			  </div>
			</form>
		</div>

@endsection
