@extends('user.layout')

@section('content')
<section class="h-100 container-fluid" style="background-color: #eee; width:100% !important">
    <div class="h-100 py-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-11">

                <h3 class="fw-normal mb-0 text-black">Checkout</h3>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalAmount = 0; // Initialize total amount
                            @endphp

                            @if (!empty($products))
                            @foreach ($products as $item)
                            <tr>
                                <td>{{ $item['product']['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ $item['product']['price'] }}</td>
                                <td>${{ $item['quantity'] * $item['product']['price'] }}</td>
                            </tr>
                            @php
                            $totalAmount += $item['quantity'] * $item['product']['price']; // Calculate total amount
                            @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <!-- Payment form -->
                    <form action="{{ route('stripe.post') }}" method="POST" id="payment-form">
                        @csrf
                        <!-- Display payment fields here (e.g., card details) -->
                        <div class="form-group">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <!-- Payment details -->
                        <div class="form-group">
                            <label for="payment-details">Payment Details</label>
                            <textarea class="form-control" id="payment-details" name="payment_details" rows="3"></textarea>
                        </div>

                        <!-- Total amount -->
                        <div class="form-group">
                            <label for="total-amount">Total Amount</label>
                            <input type="text" class="form-control" id="total-amount" value="${{ $totalAmount }}" readonly>
                        </div>

                        <button type="submit">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add your JavaScript code here for Stripe Elements integration -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    var card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
@endsection
