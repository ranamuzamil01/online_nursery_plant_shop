<!-- Display products in the cart -->
@foreach ($products as $product)
    <!-- Display product information and quantity adjustment buttons -->
    {{ $product->name }} - Quantity: {{ $cart[$product->id] }}
    <!-- Delete button -->
    <a href="{{ route('cart.delete', ['id' => $product->id]) }}">Delete</a>
@endforeach
