@extends('user.layout')


@section('content')

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

<!-- contact section starts  -->

<section class="contact" id="contact">

<h1 class="heading">get in touch</h1>

<div class="row">
   

    <form action="{{URL::to('/contact-form')}}" method="post">
        @csrf
        <div class="inputBox">
            <input type="text" name="name" required>
            <label>name</label>
        </div>
        <div class="inputBox">
            <input type="email" name="email" required>
            <label>email</label>
        </div>
        <div class="inputBox">
            <input type="number" name="number" required>
            <label>number</label>
        </div>
        <div class="inputBox">
            <textarea required name="message" id="" cols="30" rows="10"></textarea>
            <label>message</label>
        </div>

        <input type="submit" value="send message" name="submit" class="btn">

    </form>
    <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54738.63573140693!2d70.91514156097094!3d30.965884778265796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3925a6e2d5d4c95b%3A0x48ffaa61e5673b00!2sLayyah%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1677676705430!5m2!1sen!2s"   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="height: 500px"></iframe>
  
</div>
</div>

</section>

<!-- contact section ends -->


@endsection


<!-- footer///////// -->



