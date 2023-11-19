@extends('user.layout')

@section('content')


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
                            @if ($product->favorite == 1)
                                <form action="{{ route('favorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fav" value="0">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button type="submit"   > <a class="fas fa-heart bg-success"> </a></button>
                                </form>
                                @else
                                <form action="{{ route('favorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="fav" value="1">
                                <button type="submit"   > <a class="fas fa-heart"> </a></button>
                            </form>
                            @endif
                            {{-- <form action="{{route('add_fav')}}" method="POST"> --}}
                            {{-- </form> --}}
                            {{-- <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a> --}}
                        </div>



                        @if(file_exists(public_path('storage/product_images/' . $product->image)))
                        <img src="{{ asset('storage/product_images/' . $product->image) }}" alt="">
                        {{-- <img src="{{ url('storage/app/public/product_images/' . $product->image) }}" alt=""> --}}

                    @else
                        Image not found.
                    @endif
                    
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
                            <input type="number" min="1" max="100" value="{{ $product->quantity }}" name="quantity[{{ $product->id }}]" class="quantity-input">
                        </div>
                        <div class="price">{{ $product->original_price }}<span>{{ $product->price }}</span></div>

                        <a href="{{ url('add_cart') }}/{{ $product->id }}" class="btn">add to cart</a>
                    </div>
                @endforeach
            @else
                <div class="row mt-4  bg-danger w-100">
                    <h1 class="text-lg text-center text-white">No Products Found</h1>
                </div>
            @endif

           

        </div>

    </section>













@endsection
