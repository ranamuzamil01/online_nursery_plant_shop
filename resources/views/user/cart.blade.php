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

<section class="h-100 container-fluid" style="background-color: #eee; width:100% !important">
    <div class="h-100 py-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-11 ">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    <div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Discount Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $cartItems = session('products', []);
                            @endphp
                            @if (!@empty($cartItems))
                            @foreach ($cartItems as $product)
                            
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>
                                    <div class="profile-icon" onclick="showProfilePopup('{{ $product['name'] }}', '{{ $product['price'] }}')">
                                         <img src="{{ asset('storage/product_images/'. $product['image']) }}" style="width:70px;" class="img-fluid rounded-3" --}}
                                            alt="{{ $product['name'] }}"> 
                                            {{-- <img src="{{ asset('storage/product_images/'.$product['image']) }}" style="width:70px"; alt=""> --}}
                                    </div>
                                </td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['category'] }}</td>
                                <td>
                                    <div class="d-flex">
                                        <!-- Quantity controls -->
                                        <button class="btn btn-link px-2" onclick="decrementQuantity({{ $product['id'] }})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input id="quantity_{{ $product['id'] }}" min="1" name="quantity" value="{{ isset($product['quantity']) ? $product['quantity'] : 1 }}" type="number" class="form-control form-control-sm" />
                                        <button class="btn btn-link px-2" onclick="incrementQuantity({{ $product['id'] }})">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="small text-secondary text-decoration-line-through"
                                    style="text-decoration: line-through;">${{ $product['discount_price'] }}</h5>
                                </td>
                                {{-- <td>${{ $product['price'] }}</td> --}}
                                {{-- <td>${{ $product['price'] * $product['quantity'] }}</td> --}}
                                <td><div class="total-amount">
                                    <span>Total Amount:</span>
                                    <span class="amount">{{ $product['price']* $product['quantity'] }}</span>
                                </div></td>
                                <td>
                                    <a href="{{ url('/delete_cart') }}/{{ $product['id'] }}" class="text-danger">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                    {{-- <div class="card"> --}}
                                    <div class="card-body">
                                        <a href="{{ URL::to('/stripe') }}">
                                            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                                        </a>
                                    </div>
                                    {{-- </div> --}}
                                </td>

                                <td>

                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    {{-- <div class="card">
                        <div class="card-body">
                            <a href="{{ URL::to('stripe') }}">
                                <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay All</button>
                            </a>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Profile Popup -->
<div class="profile-popup" id="profilePopup">
    <div class="popup-content">
        <!-- Profile information content here -->
        <h3 id="popupProductName"></h3>
        <p id="popupProductPrice"></p>
        <!-- Other profile information -->
        <button class="popup-close" onclick="closeProfilePopup()">Close</button>
    </div>
</div>

<!-- CSS Styles (Add appropriate styles based on your design) -->
<style>
    .profile-icon {
        /* Your styles here */
        cursor: pointer;
    }

    .profile-popup {
        /* Your styles here */
        display: none;
        /* Positioning, background, etc. */
    }

    .popup-content {
        /* Your styles for the popup content */
    }
</style>

<!-- JavaScript to handle popup open/close -->
<script>
    function showProfilePopup(productName, productPrice) {
        var profilePopup = document.getElementById("profilePopup");
        var popupProductName = document.getElementById("popupProductName");
        var popupProductPrice = document.getElementById("popupProductPrice");

        popupProductName.textContent = productName;
        popupProductPrice.textContent = "Price: $" + productPrice;

        profilePopup.style.display = "block";
    }

    function closeProfilePopup() {
        var profilePopup = document.getElementById("profilePopup");
        profilePopup.style.display = "none";
    }


     // Get all quantity inputs and total amount elements
     const quantityInputs = document.querySelectorAll('.quantity-input');
    const totalAmounts = document.querySelectorAll('.amount');

    // Function to update total amount based on quantity change
    function updateTotalAmount() {
        totalAmounts.forEach((totalAmount, index) => {
            const quantity = parseFloat(quantityInputs[index].value) || 0; // Get the quantity
            const price = parseFloat(totalAmount.dataset.price) || 0; // Get the product price from a data attribute

            // Calculate and update the total amount
            totalAmount.textContent = (quantity * price).toFixed(2);
        });
    }

    // Add event listeners to quantity inputs to update total amount on change
    quantityInputs.forEach(quantityInput => {
        quantityInput.addEventListener('input', updateTotalAmount);
    });

    // Initial update of total amounts
    updateTotalAmount();
</script>

@endsection

