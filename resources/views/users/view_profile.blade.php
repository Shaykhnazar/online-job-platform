@extends('layouts.main')
@section('content')
    @include('layouts.parts.breadcrumbs', ['title' => 'View profile'])

      <div class="container-fluid text-center" style="margin: 0; margin-top: 8%">
         <h4 class="text-center">Job Profile</h4>
      </div>
      <div class="container-fluid" style="margin: 0; margin-top: 1%">
        <div class="p-2 text-right">
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add / edit profile section
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/users/personalinfo">Personal Information</a>
                    <a class="dropdown-item" href="/users/education">Education</a>
                    <a class="dropdown-item" href="#">Experience</a>
                    <a class="dropdown-item" href="#">Skills</a>
                  </div>
                </div>
              </div>
      </div>
        <div class="row p-2 mx-auto" style="width:100%; border-radius: 10px;">
          <div class="col-lg-3">
          	<div class="">
          		<p class="text-center">
            		<img class="rounded-circle" alt="100x100" src="https://pngimage.net/wp-content/uploads/2018/05/dummy-profile-image-png.png" width="150px" height="150px"
  	          	data-holder-rendered="true">
	            </p>
          		<h3 class="text-center">{{ Auth::user()->name }}</h3>
          		<p class="text-center">Current Status</p>
          		<div class="text-muted">
	          		<i class="fas fa-map-marker-alt"></i> &nbsp;{{  Auth::user()->personalInfo->present_address ?? '' }}<br>
	          		<i class="fa fa-phone"></i> &nbsp;{{  Auth::user()->personalInfo->mobile ?? '' }}<br>
	          		<i class="fab fa-github"></i> &nbsp;{{  Auth::user()->personalInfo->github ?? '' }}<br>
	          		<i class="fa fa-envelope"></i> &nbsp;{{ Auth::user()->email }}<br>

	          		<i class="fab fa-linkedin">
                        <a href='{{  Auth::user()->personalInfo->linkedin ?? "" }}'>{{  Auth::user()->personalInfo->linkedin ?? '' }}</a><br>
                    </i>
                    <i class="fab fa-facebook">{{  Auth::user()->personalInfo->facebook ?? '' }}</i>
                </div>
          	</div>
          </div>
          <div class="col-lg-9" style=" list-style-position: outside;">
          	<h5><span>Experience</span></h5>
          	<h5 class="mt-4"><span>Education</span></h5>
          	<ul style=" list-style-position: outside;">
              @foreach($education as $user_education)
              <li style=" list-style-position: outside;">
          		  <label><b>{{$user_education->degree_name}} - {{$user_education->institute}} - {{$user_education->location}}</b></label><br>
                <label>{{$user_education->subject}} - Passing Year: {{date('F Y', strtotime($user_education->passing_year) + 6*3600) }} - Result: {{$user_education->result}}</label>
              </li>
              @endforeach
          	</ul>
          	<h5 class="mt-4"><span>Skill</span></h5>
          	<h5 class="mt-4"><span>Project</span></h5>
          	<h5 class="mt-4"><span>Training</span></h5>
          	<h5 class="mt-4"><span>Publication</span></h5>
      			<h5 class="mt-4"><span>Additional Activities</span></h5>
      			<h5 class="mt-4"><span>Extra Cirriculum Activities</span></h5>
      			<h5 class="mt-4"><span>Reference</span></h5>
          </div>
        </div>
    </body>
</html>
@endsection
