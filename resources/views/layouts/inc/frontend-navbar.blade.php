
   
      
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
      <div class="container">
        <a href="" class="navbar-brand d-inline d-sm-inline d-md-none"><img src="{{ asset('assets/images/logo.png')}}" class="logo" alt="logo"></a>
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>

               
             
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}
              @php
               $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                  
              @endphp
              @foreach ($categories as $cateitem)
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/kategori/'.$cateitem->slug) }}">{{ $cateitem->name }}</a>
              </li>
              @endforeach
             
            </ul>
          </div>
        </div>
      </div>
      </nav>
    </div>
  
