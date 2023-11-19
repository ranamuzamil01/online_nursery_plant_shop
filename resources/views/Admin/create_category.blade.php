

@extends('Admin.index')


   @section('content')
   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">




<main id="main" class="main">


    <section class="section">


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
        <hr>






    </section>

</main><!-- End #main -->
