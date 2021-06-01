@extends('layouts.main')
@section('content')
    @include('layouts.parts.breadcrumbs', ['title' => 'Education degree add'])

		<div class="container-fluid p-5 " >
			<h4 class="pb-2 pl-2" style="text-align: center;">Add New Educational Degree</h4>
			<a class='m-2' href='{{ route("education.index") }}' style="color: blue; text-decoration: underline;"> View all</a>
			<br><label class='m-2'>Profile of <b>{{Auth::user()->name}}</b></label>
			<form action="{{ route("education.store") }}" method="post" class="card p-4 m-2 p-4 mb-5" style='background-color: rgb(253, 253, 253); border:none; border-radius: 1% '>
			  @csrf
			  <div class="form-row">
			    <div class="form-group col-md-4">
				    <label for="exampleFormControlInput1">Degree Name</label>
				    <input type="text" class="form-control"  name="degree_name">
			  	</div>
			    <div class="form-group col-md-8">
			      <label for="exampleFormControlInput1">Department/Subject</label>
			      <input type="text" class="form-control"  name="subject">
			    </div>
			   </div>
			   <div class="form-row">
			     <div class="form-group col-md-8">
			      <label for="exampleFormControlInput1">Institute</label>
			      <input type="text" class="form-control"  name="institute">
			    </div>
			     <div class="form-group col-md-4">
			      <label for="exampleFormControlInput1">Location</label>
			      <input type="text" class="form-control"  name="location">
			    </div>
			   </div>
			   <div class="form-row">
			     <div class="form-group col-md-2">
			      <label for="exampleFormControlInput1">Passing Year</label>
			      <input type="date" class="form-control"  name="passing_year">
			    </div>
			     <div class="form-group col-md-2">
			      <label for="exampleFormControlInput1">Result</label>
			      <input type="text" class="form-control"  name="result">
			    </div>
			   </div>
			  <div class="form-row">
				  <div class="form-group col-md-1 mt-2">
				      <button type="submit" class=" form-control btn btn-sm btn btn-primary font-weight-bold">Save</button>
				   </div>
				</div>
			</form>
		</div>

@endsection
