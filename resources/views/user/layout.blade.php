
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online_Nursery_Plant_Shopping_website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> --}}
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</head>

<body>

    <!-- header section starts  -->



    <!-- header section ends -->
    <!-- home section starts  -->
    @include('user.header')

    
    <!-- home section ends -->

    @yield('content')





    <section class="footer">
        <hr>
        <div class="box-container">

        
            <div class="box">
                <h3>branch locations</h3>
                <a href="#">Layyah</a>
                <a href="#">Chock Azam</a>
                <a href="#">Karor</a>
                <a href="#">Jaman sha</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="{{ url('/') }}">home</a>
                <a href="#category">category</a>
                <a href="{{ URL::to('/product') }}">Product</a>
                <a href="{{ url('/newslatter') }}">Newslatter</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ url('/about') }}">About</a>
            </div>
            <div class="box display-flex flex-direction: row mt-5">
                <h3 class="m-2">Follow us</h3>
                <a href="https://web.facebook.com/profile.php?id=100041604254458">
                  <i class="fab fa-facebook-f mt-5 p-2"></i> 
                </a>
                <a href="#">
                  <i class="fab fa-twitter mt-5 p-2"></i> 
                </a>
                <a href="#">
                  <i class="fab fa-instagram mt-5 p-2"></i>
                </a>
                <a href="#">
                  <i class="fab fa-linkedin mt-5 p-2"></i>
                </a>
              </div>
              
              

        </div>

        <h1 class="credit"> created by <span> mr. Irfan & Team</span> | all rights reserved! </h1>

    </section>

    <!-- footer section ends -->

    <!-- scroll top button  -->
    <a href="#home" class="scroll-top fas fa-angle-up"></a>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>
