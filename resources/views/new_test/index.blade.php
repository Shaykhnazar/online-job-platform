@extends('layouts.main')
@section('content')
<?php
  use App\Category;
  use App\Job;
  use App\Employeer;
  use App\User;
?>
        <!--https://www.gstatic.com/flights/app/illustration-flights-desktop.svg-->
         <?php
          function get_snippet( $str, $wordCount = 10 ) {
            return implode(
              '',
              array_slice(
                preg_split(
                  '/([\s,\.;\?\!]+)/',
                  $str,
                  $wordCount*2+1,
                  PREG_SPLIT_DELIM_CAPTURE
                ),
                0,
                $wordCount*2-1
              )
            );
          }

          function to_time_ago( $time ) {

            // Calculate difference between current
            // time and given timestamp in seconds
            $diff = time() - $time;

            if( $diff < 1 ) {
                return 'less than 1 second ago';
            }

            $time_rules = array (
                        12 * 30 * 24 * 60 * 60 => 'year',
                        30 * 24 * 60 * 60       => 'month',
                        24 * 60 * 60           => 'day',
                        60 * 60                   => 'hour',
                        60                       => 'minute',
                        1                       => 'second'
            );

            foreach( $time_rules as $secs => $str ) {

                $div = $diff / $secs;

                if( $div >= 1 ) {

                    $t = round( $div );

                    return $t . ' ' . $str .
                        ( $t > 1 ? 's' : '' ) . ' ago';
                }
            }
        }
        ?>


<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span>{{ \App\Job::lastWeekJobsCount() }}</span> Jobs posted last week
                </h1>
                <form action="{{ route('jobs.index') }}" class="search-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" value="{{ request()->has('search') ? request()->get('search') : '' }}" name="search" placeholder="what are you looging for?">
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects">
                            <select name="region_id">
                                <option value="">Select area</option>
                                @foreach(\App\Region::get(['id', 'name']) as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 form-cols">
                        <div class="default-select" id="default-selects2">
                            <select name="category">
                                <option value="">All Category</option>
                                @foreach(Category::featured()->get(['category_id' , 'category_name']) as $cat)
                                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 form-cols">
                        <button type="submit" class="btn btn-info">
                            <span class="lnr lnr-magnifier"></span> Search
                        </button>
                    </div>
            </div>
            </form>
            <p class="text-white"> <span>Search by tags:</span> Technology, Business, Consulting, IT Company, Design, Development</p>
        </div>
    </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start features Area -->
    <section class="features-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature">
                        <h4>Live Jobs</h4>
                        <h3 class="font-weight-bold" style="color: #000000;"> {{ (Job::count()) }}</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature">
                        <h4>Live Resume</h4>
                            <h3 class="font-weight-bold" style="color: #000000;">{{ (User::count()) }}</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature">
                        <h4>Emploeers</h4>
                        <h3 class="font-weight-bold" style="color: #000000;">{{ (Employeer::count()) }}</h3>
                    </div>
                </div>
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="single-feature">--}}
{{--                        <h4>Notifications</h4>--}}
{{--                        <p>--}}
{{--                            FIll here--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- End features Area -->

    <!-- Start popular-post Area -->
{{--    <section class="popular-post-area pt-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="active-popular-post-carusel">--}}
{{--                    @foreach(\App\Job::with('region')->latest()->take(10)->get(['job_id', 'title', 'job_context']) as $job)--}}
{{--                        <div class="single-popular-post d-flex flex-row">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="/front_assets/img/p1.png" alt="">--}}
{{--                                <a class="btns text-uppercase" href="{{route('jobs.show', $job->job_id)}}">view job post</a>--}}
{{--                            </div>--}}
{{--                            <div class="details">--}}
{{--                                <a href="{{route('jobs.show', $job->job_id)}}"><h4>{{ $job->title }}</h4></a>--}}
{{--                                <h6>{{ $job->company->name ??"" }}</h6>--}}
{{--                                <p>--}}
{{--                                    {{ Str::limit($job->job_context) }}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- End popular-post Area -->

    <!-- Start feature-cat Area -->
    <section class="feature-cat-area pt-100" id="category">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Featured Job Categories</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Category::featured()->get(['category_id', 'category_name', 'logo']) as $cat)
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="{{ route('jobs.index', ['category' => $cat->category_name]) }}">
                                <img class="img-thumbnail" src="{{ asset('storage/'.$cat->logo) }}" alt="">
                            </a>
                            <p>{{$cat->category_name}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End feature-cat Area -->

    <!-- Start post Area -->
    @include('layouts.parts.post_with_sidebar')
    <!-- End post Area -->

    <!-- Start callto-action Area -->
{{--    <section class="callto-action-area section-gap" id="join">--}}
{{--        <div class="container">--}}
{{--            <div class="row d-flex justify-content-center">--}}
{{--                <div class="menu-content col-lg-9">--}}
{{--                    <div class="title text-center">--}}
{{--                        <h1 class="mb-10 text-white">Join us today without any hesitation</h1>--}}
{{--                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>--}}
{{--                        <a class="primary-btn" href="#">I am a Candidate</a>--}}
{{--                        <a class="primary-btn" href="#">Request Free Demo</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- End calto-action Area -->

    <!-- Start download Area -->
    {{--<section class="download-area section-gap" id="app">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-lg-6 download-left">--}}
    {{--                <img class="img-fluid" src="img/d1.png" alt="">--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-6 download-right">--}}
    {{--                <h1>Download the <br>--}}
    {{--                    Job Listing App Today!</h1>--}}
    {{--                <p class="subs">--}}
    {{--                    It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.--}}
    {{--                </p>--}}
    {{--                <div class="d-flex flex-row">--}}
    {{--                    <div class="buttons">--}}
    {{--                        <i class="fa fa-apple" aria-hidden="true"></i>--}}
    {{--                        <div class="desc">--}}
    {{--                            <a href="#">--}}
    {{--                                <p>--}}
    {{--                                    <span>Available</span> <br>--}}
    {{--                                    on App Store--}}
    {{--                                </p>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="buttons">--}}
    {{--                        <i class="fa fa-android" aria-hidden="true"></i>--}}
    {{--                        <div class="desc">--}}
    {{--                            <a href="#">--}}
    {{--                                <p>--}}
    {{--                                    <span>Available</span> <br>--}}
    {{--                                    on Play Store--}}
    {{--                                </p>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- End download Area -->
@endsection
