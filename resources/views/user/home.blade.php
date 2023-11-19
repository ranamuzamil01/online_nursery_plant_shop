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


    <!-- banner section starts  -->

    <section class="banner-container">

        <div class="banner">
            <img src="{{asset('images/banner1.jpg')}}" alt="">
            <div class="content">
                <span>new arrivals</span>
                <h3>house plants</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>
        <div class="banner">
            <img src="{{asset('images/banner2.jpg')}}" alt="">
            <div class="content">
                <span>new arrivals</span>
                <h3>office plants</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

    </section>

    <!-- banner section ends -->

    <!-- category section starts  -->

    <section class="category" id="category">

        <h1 class="heading"> shop by Category </h1>

        <div class="box-container">
            @if (!empty($categories))
                @foreach ($categories as $value)
                    <div class="box col-md-3">
                        <img src="{{ asset('storage/category_images/'.$value->image) }} " alt="">
                        <div class="content">
                            <h3>{{ $value->categories }}</h3>
                            <form action="{{ URL::to('/product') }}" method="GET">
                                <input type="hidden" name="category" value="{{ $value->categories }}">
                               <button type="submit" class="btn">Show Products</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>




    </section>

    <!-- category section ends -->

    <!-- product section starts  -->

    <section class="product" id="product">

        <h1 class="heading"> new products </h1>

        <div class="box-container">

            @if (!empty($products))
                @foreach ($products as $product)
                    <div class="box col-md-4">
                        <span class="discount">
                            -{{ round((1 - $product->discount_price / $product->original_price) * 100) }}%
                        </span>
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        {{-- <img src="{{ asset('storage/product_images'. $product->image) }}" alt=""> --}}
                        <img src="{{ asset('storage/product_images/'.$product->image) }} " alt="">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p> <!-- Added description here -->
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->rate)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <div class="quantity">
                            <span> Quantity : </span>
                            <input type="number" min="1" max="100" value="{{ $product->quantity }}"
                                name="quantity[{{ $product->id }}]">
                        </div>
                        <div class="price">{{ $product->original_price }}<span>{{ $product->price }}</span></div>
                        <a href="{{ url('add_cart') }}/{{ $product->id }}" class="btn">add to cart</a>
                    </div>
                @endforeach
            @endif



        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ URL::to('/product') }}" class="btn btn-success p-4" style="width: 100px;">
                See More <span class="ml-2">>></span>
            </a>
        </div>



    </section>


    <!-- product section ends -->

    <!-- .icons section starts  -->

    <section class="icons-container">

        <div class="icon">
            <img src="{{asset('images/icon1.png')}}" alt="">
            <div class="content">
                <h3>free shipping</h3>
                <p>Free shipping on order</p>
            </div>
        </div>
        <div class="icon">
            <img src="{{asset('images/icon2.png')}}" alt="">
            <div class="content">
                <h3>100% Money Back</h3>
                <p>You've 30 days to Return</p>
            </div>
        </div>
        <div class="icon">
            <img src="{{asset('images/icon3.png')}}" alt="">
            <div class="content">
                <h3>Payment Secure</h3>
                <p>100% secure payment</p>
            </div>
        </div>
        <div class="icon">
            <img src="{{asset('images/icon4.png')}}" alt="">
            <div class="content">
                <h3>Support 24/7</h3>
                <p>Contact us anytime</p>
            </div>
        </div>

    </section>

    <!-- .icons section ends -->

    <!-- deal section starts  -->

    <section class="deal" id="deal">

        <h1 class="heading"> deal of the day </h1>

        <div class="row">

            <div class="content">
                <h3 class="title">don't miss the deal</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem eligendi repudiandae pariatur.
                    Aut, esse molestias laborum sunt reprehenderit repellat officiis aspernatur consequatur nemo! Veritatis,
                    ex architecto! Eligendi, iste nulla.</p>
                <div class="count-down">
                    <div class="box">
                        <h3 id="day">00</h3>
                        <span>day</span>
                    </div>
                    <div class="box">
                        <h3 id="hour">00</h3>
                        <span>hour</span>
                    </div>
                    <div class="box">
                        <h3 id="minute">00</h3>
                        <span>minute</span>
                    </div>
                    <div class="box">
                        <h3 id="second">00</h3>
                        <span>second</span>
                    </div>
                </div>
                <a href="#" class="btn">check out deal</a>
            </div>

            <div class="image">
                <img src="{{asset('images/deal-img.jpg')}}" alt="">
            </div>

        </div>

    </section>

    <!-- deal section ends -->


@endsection

