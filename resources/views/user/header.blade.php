<header>

   

<div class="header-2">

    <a href="{{url('/')}}" class="logo"><img src="{{asset('images/logo.png')}}" alt="" style="width: 80px;" ></a>


        <form action="{{ URL::to('/product') }}" class="search-bar-container" method="GET">
            <input type="search" name="search" id="search-bar" placeholder="search here...">
            <button type="submit" style="background: transparent"><label for="search-bar"
                    class="fas fa-search"></label></button>
        </form>
        <div class="col-2 mr-0 float-right">
            @if (Auth::user() == '')
                <a href="{{ route('login') }}"><button class="btn btn-primary m-0 mr-2 p-3">Log In</button></a>

                <a href="{{ route('register') }}"><button class="btn btn-primary m-0 ml-2 p-3">Register</button></a>
            @else
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black"></h3>
                <div>
                    <a href="{{ route('logoutt') }}">
                        <button class="btn btn-danger m-1 mr-0 mf-0 p-3">Log Out</button>
                    </a>
                    {{-- <a href="{{ route('stripe.index') }}">Go to Stripe Page</a> --}}
                </div>
            </div>
            
            @endif
        </div>

    </div>

    <div class="header-3">

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="{{ url('/') }}">home</a>

          
            <div class="dropdown">
                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Categories
                </a>
               
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (!empty($category_list))
                        @foreach ($category_list as $value)
                            <form action="{{ URL::to('/product') }}" method="GET">
                                <input type="hidden" name="category" value="{{ $value->categories }}">
                               <a href="" style="text-decoration: none;" class=" m-0"><button style="" type="submit" class="dropdown-item" >{{ $value->categories }}</button></a>
                            </form>
                        @endforeach
                    @endif
                </div>


            </div>
            <a href="{{ URL::to('/product') }}">product</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/contact') }}">Contact Us</a>
            <a href="{{ url('/newslatter') }}">Newslatters</a>
            <a href="{{ url('/About New') }}">About New</a>
            {{-- <a href="{{url('/contact')}}">My Team</a> --}}
        </nav>

        <div class="icons">
            <a href="{{ route('view_cart') }}" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-user-circle"></a>
            {{-- <a href="{{route('user_profile', '_blank')}}" class="btn btn-primary btn-sm">
                View Profile
            </a> --}}
        </div>

    </div>

</header>

<script>
    // When the user clicks on the profile icon, show the popup
    $('.fas.fa-user-circle').click(function() {
        $('#profile-popup').modal('show');
        // Animate the popup
        $('#profile-popup').addClass('animated fadeIn');
        // Set the position of the popup to bottom
        $('#profile-popup').css('position', 'bottom');
    });
</script>

@if (!empty(Auth::user()))
    

<!-- The popup -->
<div class="modal fade" id="profile-popup" tabindex="-1" aria-labelledby="profile-popup-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-popup-label">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="..." class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h4>{{Auth::user()->name}}</h4>
                        <p>Email: {{Auth::user()->email}}</p>
                        <p>Joined Date: {{Auth::user()->created_at}}</p>
                        <p>Phone No#: {{Auth::user()->number}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<style>
    .modal-dialog {
      position: fixed;
      top: 22%;
      left: 65%;
      
      transform: translate(-50%, -50%);
    }
  
    .modal-body {
      text-align: center;
      /* width: 800px; */
      height: 200px;
      font-size: 15px;
    }
  </style>