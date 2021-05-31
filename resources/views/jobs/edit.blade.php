<?php
	use App\Category;
?>
@extends('layouts.main')
@section('content')
    @include('layouts.parts.breadcrumbs', ['title' => 'Edit Job Information'])
		<div class="container-fluid p-5 " style="margin-top: 5%">
			<h3 style="text-align: center;">Edit Job Information</h3>
			<form action="{{ route("jobs.update", $job->job_id) }}" method="post" class="card p-4 m-2 p-4 mb-5 bg-white" style='border:none; box-shadow: ;background-color: rgb(253, 253, 253);'>
			  @csrf
			  <div class="form-row">
			    <div class="form-group col-md-6">
				    <label for="exampleFormControlInput1">Job Title</label>
				    <input type="text" class="form-control" name="title" value="{{$job->title}}">
			  	</div>
			    <div class="form-group col-md-2">
			      <label for="exampleFormControlInput1">No. Vacancy</label>
			      <input type="number" class="form-control" name="vacancy" value="{{$job->vacancy}}">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputZip">Application Deadline</label>
			      <input type="date" class="form-control" name="deadline" value="{{$job->deadline}}">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-2">
				    <label for="exampleFormControlSelect1">Employment Status</label>
				    <select class="form-control"  name="employment_type">
                        @foreach(\App\Job::$TYPE as $key => $type)
                            <option value="{{$key}}" {{ ($job->employment_type == $key) ? 'selected' : '' }}>{{$type}}</option>
                        @endforeach
				    </select>
			  </div>
			  <div class="form-group col-md-2">
				    <label for="exampleFormControlInput1">Salary</label>
			    	<input type="text" class="form-control"  name="salary" value="{{$job->salary}}">
			  </div>
			    <div class="form-group col-md-2">
			      <label for="inputState">Location</label>
			      <select id="inputState" class="form-control" name="region_id">
                      @foreach(\App\Region::get(['id', 'name']) as $region)
                          <option value="{{$region->id}}" {{ ($job->region_id == $region->id) ? 'selected' : '' }}>{{$region->name}}</option>
                      @endforeach
			      </select>
			    </div>
			    <div class="form-group col-md-3">
			      <label for="inputState">Gender</label>
			      <select  class="form-control" name="gender">
			        <option selected value="{{$job->gender}}">{{$job->gender}}</option>
			        <option value="Both Male and Female">Both Male and Female</option>
			        <option value="Male">Only Male</option>
			        <option value="Female">Only Female</option>
			      </select>
			    </div>
			    <div class="form-group col-md-3">
			      <label>Age Range = <span id="rangeValue"></span></label>
			      <input id="rangeInput" type="range" class="form-control" name="age" value="{{$job->age}}" min="18" max="99">
			    </div>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-3">
				    <label for="inputState">Job Category</label>
			      <select  class="form-control" name="category_name">
			      	<option selected value="{{$job->category}}">{{$job->category}}</option>
			      	@foreach(Category::all() as $category)
			        	<option value="{{$category->category_name}}">{{$category->category_name}}</option>
			        @endforeach
			      </select>
				  </div>
				  <div class="form-group col-md-9">
				    <label>Keyword</label>
				    <textarea class="form-control"  rows="1" name="keywords">{{$job->keywords}}</textarea>
				  </div>
			  </div>
			  <div class="form-group">
			    <label>Job Context</label>
			    <textarea class="form-control" rows="3" name="job_context">{{$job->job_context}}</textarea>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
				    <label>Job Responsibilities</label>
				    <textarea class="form-control"  rows="5" name="responsibilities">{{$job->responsibilities}}</textarea>
				  </div>
				  <div class="form-group col-md-6">
				    <label>Educational Requiresments</label>
				    <textarea class="form-control"  rows="5" name="education">{{$job->education}}</textarea>
				  </div>
			  </div>
			  <div class="form-group">
				    <label>Experience Requiresments</label>
				    <textarea class="form-control" rows="5" name="requirements">{{$job->requirements}}</textarea>
			  </div>
			  <div class="form-group">
			    <label>Additional Requirements</label>
			     <textarea class="form-control"  rows="8" name="additional_requirements">{{$job->additional_requirements}}</textarea>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
				    <label> Compensation & Other Benefits</label>
				    <textarea class="form-control" rows="5" name="benifits">{{$job->benifits}}</textarea>
				  </div>
				  <div class="form-group col-md-6">
				    <label>Apply Instruction</label>
				    <textarea class="form-control" rows="5" name="apply_instruction">{{$job->apply_instruction}}</textarea>
				  </div>
			  </div>
			  <div class="text-center">
			  	<button type="submit" class="btn btn-sm btn-primary col-lg-2 font-weight-bold text-center">Update</button>
			  </div>
			</form>
		</div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function (){
            document.getElementById('rangeInput').value = document.getElementById('rangeValue').value;
        });
        function updateTextInput(val) {
            document.getElementById('rangeValue').value = val;
        }
    </script>
@endpush
