@extends('layout.app')
@section('content')

		<div class="container-fluid p-5 " >
			<h4 class="pb-2 pl-2" style="text-align: center;">Edit Skill Information</h4>
			<a class='m-2' href='{{ route('skills.index') }}' style="color: blue; text-decoration: underline;"> View all</a>
			<form action="{{ route("skills.update", $item->id )}}" method="post" class="card p-4 m-2 p-4 mb-5" style='background-color: rgb(253, 253, 253); border:none; border-radius: 1% '>
			  @method('PUT')
                @csrf
			  <div class="form-row">
			  	<div class="form-group col-md-1">
				    <label>Category ID</label>
				    <p class="form-control">{{$item->id}}</p>
			  	</div>
			    <div class="form-group col-md-4">
				    <label>Skill Name</label>
				    <input type="text" class="form-control"  name="name" value="{{$item->name}}">
			  	</div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Featured</label>
                      <select class="form-control" name="featured">
                          <option value="1" {{ ($item->featured) ? "selected" : "" }}>Yes</option>
                          <option value="0" {{ (!$item->featured) ? "selected" : "" }}>No</option>
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
