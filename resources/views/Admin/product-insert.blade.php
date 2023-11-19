

@extends('Admin.index')


   @section('content')
   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">




  <main id="main" class="main">


    <section class="section">

{{-- 
      <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group">

            <label for="categories">New Category:</label>
            <input type="text" class="form-control" id="categories" name="categories" required>
        </div>
        <div class="form-group mt-2">
          <label for="image">Category Image:</label>
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
      </div>
        <button type="submit" class="btn btn-primary mt-3">Create Category</button>
      </form>
      <hr> --}}


      {{-- //////////////////////////////////// --}}
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <h2>Add Product</h2>
              <form action="{{ URL::to('/product-store') }}" method="POST" enctype="multipart/form-data">
               @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
          <label for="category">Product category:</label>
          <input type="text" class="form-control" id="category" name="category" required>
      </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="number" class="form-control" id="rate" name="rate" step="0.1" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="discount_price">Discount Price:</label>
            <input type="number" class="form-control" id="discount_price" name="discount_price" step="0.01">
        </div>
        <div class="form-group">
            <label for="original_price">Original Price:</label>
            <input type="number" class="form-control" id="original_price" name="original_price" step="0.01">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
          <label for="tags">Tags (comma-separated):</label>
          <input type="text" class="form-control" id="tags" name="tags">
      </div>
        <div class="form-group m-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>


            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->
