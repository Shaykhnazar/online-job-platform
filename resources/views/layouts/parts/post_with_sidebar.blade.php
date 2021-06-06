<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">
                <ul class="cat-list">
                    @foreach(\App\Job::$TYPE as $key => $type)
                        <li><a href="{{route('jobs.index', ['job_type' => $key])}}">{{ $type }}</a></li>
                    @endforeach
                </ul>

                @foreach(\App\Job::with(['company', 'region'])->latest()->take(10)->get(['job_id', 'title', 'job_context', 'employment_type', 'salary']) as $job)
                    <div class="single-post d-flex flex-row">
                        <div class="thumb">
                            <img src="{{ asset('front_assets/img/post.png') }}" alt="">
                            <ul class="tags">
                                <li>
                                    <a href="#">Art</a>
                                </li>
                                <li>
                                    <a href="#">Media</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                            </ul>
                        </div>
                        <div class="details">
                            <div class="title d-flex flex-row justify-content-between">
                                <div class="titles">
                                    <a href="{{route('jobs.show', $job->job_id)}}"><h4>{{ $job->title }}</h4></a>
                                    <h6>{{ $job->company->name ??"" }}</h6>
                                </div>
                                <ul class="btns">
                                    <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                    <li><a href="{{route('jobs.show', $job->job_id)}}">Apply</a></li>
                                </ul>
                            </div>
                            <p>
                                {{ Str::limit($job->job_context) }}
                            </p>
                            <h5>Job Nature: {{ $job->employment_type }}</h5>
                            <p class="address"><span class="lnr lnr-map"></span> {{ $job->region->name ??""}}</p>
                            <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
                        </div>
                    </div>
                @endforeach
                <a class="text-uppercase loadmore-btn mx-auto d-block" href="#">Load More job Posts</a>

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Jobs by Location</h4>
                    <ul class="cat-list">
                        @foreach(\App\Region::get(['id', 'name']) as $region)
                            <li><a class="justify-content-between d-flex" href="{{route('jobs.index', ['region_id' => $region->id])}}"><p>{{$region->name}}</p><span>{{$region->jobs()->count()}}</span></a></li>
                        @endforeach
                    </ul>
                </div>

{{--                <div class="single-slidebar">--}}
{{--                    <h4>Top rated job posts</h4>--}}
{{--                    <div class="active-relatedjob-carusel">--}}
{{--                        <div class="single-rated">--}}
{{--                            <img class="img-fluid" src="img/r1.jpg" alt="">--}}
{{--                            <a href="single.html"><h4>Creative Art Designer</h4></a>--}}
{{--                            <h6>Premium Labels Limited</h6>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.--}}
{{--                            </p>--}}
{{--                            <h5>Job Nature: Full time</h5>--}}
{{--                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>--}}
{{--                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>--}}
{{--                            <a href="#" class="btns text-uppercase">Apply job</a>--}}
{{--                        </div>--}}
{{--                        <div class="single-rated">--}}
{{--                            <img class="img-fluid" src="img/r1.jpg" alt="">--}}
{{--                            <a href="single.html"><h4>Creative Art Designer</h4></a>--}}
{{--                            <h6>Premium Labels Limited</h6>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.--}}
{{--                            </p>--}}
{{--                            <h5>Job Nature: Full time</h5>--}}
{{--                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>--}}
{{--                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>--}}
{{--                            <a href="#" class="btns text-uppercase">Apply job</a>--}}
{{--                        </div>--}}
{{--                        <div class="single-rated">--}}
{{--                            <img class="img-fluid" src="img/r1.jpg" alt="">--}}
{{--                            <a href="single.html"><h4>Creative Art Designer</h4></a>--}}
{{--                            <h6>Premium Labels Limited</h6>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.--}}
{{--                            </p>--}}
{{--                            <h5>Job Nature: Full time</h5>--}}
{{--                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>--}}
{{--                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>--}}
{{--                            <a href="#" class="btns text-uppercase">Apply job</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="single-slidebar">
                    <h4>Jobs by Category</h4>
                    <ul class="cat-list">
                        @foreach(\App\Category::featured()->get(['category_name', 'no_jobs']) as $cat)
                            <li><a class="justify-content-between d-flex" href="{{ route('jobs.index', ['category' => $cat->category_name]) }}"><p>{{ $cat->category_name }}</p><span>{{ $cat->no_jobs }}</span></a></li>
                        @endforeach
                    </ul>
                </div>

{{--                <div class="single-slidebar">--}}
{{--                    <h4>Carrer Advice Blog</h4>--}}
{{--                    <div class="blog-list">--}}

{{--                        <div class="single-blog " style="background:#000 url(img/blog1.jpg);">--}}
{{--                            <a href="single.html"><h4>Home Audio Recording <br>--}}
{{--                                    For Everyone</h4></a>--}}
{{--                            <div class="meta justify-content-between d-flex">--}}
{{--                                <p>--}}
{{--                                    02 Hours ago--}}
{{--                                </p>--}}
{{--                                <p>--}}
{{--                                    <span class="lnr lnr-heart"></span>--}}
{{--                                    06--}}
{{--                                    <span class="lnr lnr-bubble"></span>--}}
{{--                                    02--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</section>
