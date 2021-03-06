<!-- start banner Area -->
<section class="banner-area relative" >
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    {{ $title }}
                </h1>
                <p class="text-white link-nav"><a href="{{ route('main') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url()->current() }}"> {{ $title }}</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
