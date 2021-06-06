@extends('layouts.main')
@section('content')
@include('layouts.parts.breadcrumbs', ['title' => 'Contact'])

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
            <div class="col-lg-4 d-flex flex-column">
                @if(Auth::guard('user')->check())
                    <a class="contact-btns" href="{{ route('user.view_profile') }}">Submit Your CV</a>
                @elseif(Auth::guard('employeer')->check())
                    <a class="contact-btns" href="{{ route('jobs.create') }}">Post New Job</a>
                @elseif(Auth::guest())
                    <a class="contact-btns" href="{{ route('user.register.show') }}">Create New Account</a>
                @endif
            </div>
            <div class="col-lg-8">
                <form class="form-area " id="myForm" action="{{ route('contact.post') }}" method="post" class="contact-form text-right">
                    @method('POST')
                    @csrf()
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            <button type="submit" class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->


@endsection
