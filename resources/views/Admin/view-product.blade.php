@extends('Admin.index')
   @section('content')
   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products </h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <h2>Products</h2>
              <table class="table datatable">
   
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Rate</th>
                <th>Discount_Price</th>
                <th>Original_Price</th>
                <th>Quantity</th>
                <th>Tags</th>
                <th>Images</th>
                <th>Action</th>
                <!-- Add other columns here -->
            </tr>
        </thead>
        <tbody>
          @if (!@empty($products))  
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->rate }}</td>
                <td>{{ $product->discount_price }}</td>
                <td>{{ $product->original_price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->tags }}</td>
                <td>
                  <img src="{{ asset('storage/product_images/'.$product->image) }} " alt="" width="80px">

              </td>
                <td>
                  <form action="{{ route('admin.product.delete', ['id' => $product->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
                <!-- Add other columns here -->
              </tr>
            @endforeach
          @endif
        </tbody>
        
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
  
</div>
</div>
    </section>

  </main><!-- End #main -->
