@extends('user.layout')

@section('content')
<style>
    /* Your existing CSS styles here */
    .btn-subscribe {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .btn-subscribe:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>
<section class="home" id="home">

    <div class=" swiper-container home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box" style="background: url('{{ asset('images/slider1.jpg') }}');">
                    <div class="content">
                        <span>upto 75% off</span>
                        <h3>plant big sale special offer</h3>
                        <a href="#" class="btn">shop now</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box" style="background: url('{{ asset('images/slider2.jpg') }}');">
                    <div class="content">
                        <span>upto 45% off</span>
                        <h3>plant make people happy</h3>
                        <a href="#" class="btn">shop now</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box" style="background: url('{{ asset('images/slider3.jpg') }}');">
                    <div class="content">
                        <span>upto 65% off</span>
                        <h3>decorate your home now</h3>
                        <a href="#" class="btn">shop now</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<section class="bg-light text-center p-5 mt-4">
    <div class="container p-3">
        <h3>SUBSCRIBE NOW</h3>
        <form action="{{ URL::to('/subscribe') }}" method="POST" id="subscription-form">
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" placeholder="Enter Your Email Id" class="form-control" required>
                <div class="input-group-append">
                    <button type="submit" value="subscribe" name="submit" class="btn btn-primary btn-subscribe">Subscribe</button>
                </div>
            </div>
        </form>
        <div id="subscribe-success" class="alert alert-success mt-3" style="display: none;">
            Thank you for subscribing!
        </div>
    </div>
</section>

@endsection

<script>
    // JavaScript for handling form submission and showing success message
    document.getElementById('subscription-form').addEventListener('submit', function (e) {
        e.preventDefault();
        // Simulate a successful subscription (you can replace this with your actual subscription logic)
        setTimeout(function () {
            document.getElementById('subscription-form').reset(); // Clear the form
            document.getElementById('subscribe-success').style.display = 'block'; // Show success message
            setTimeout(function () {
                document.getElementById('subscribe-success').style.display = 'none'; // Hide success message after a few seconds
            }, 3000);
        }, 1000);
    });
</script>
