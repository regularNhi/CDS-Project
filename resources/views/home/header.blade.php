<header class="header_section">
            <div class="container">   
            
             <!-- <nav class="navbar navbar-expand-lg custom_nav-container "> -->
             <div style="display: flex; align-items: left;"> 
             <a style="padding:20px;" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  
                
                     
                  <form action="{{url('search') }}" method="get" class="form-inline" style="width:100%;display: flex; margin-left: 20px; padding-top:20px;">
                           @csrf
                  
                  <input class="form-control" style="width:60%;" class="form-control" type="search" name="search" placeholder="Tìm kiếm sản phẩm/dịch vụ">
                          
                          
                           <div style="margin-left:20px; padding-bottom:20px;">
                           
                           <input style="width: 80px; height: 35px; border-radius: 20px; padding: 5px;" type="submit" value="Tìm">
                           
                        </div>


                        </form> 
                     
                     
                     </div>
                  <nav class="navbar navbar-expand-lg custom_nav-container " style="background: #9fc5e8; border-radius: 8px;">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                     <ul class="navbar-nav" >
                        
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('about_us')}}">Giới thiệu <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> 
                              
                           
                            <span class="nav-label">Danh mục<span class="caret"></span>
                        
                        
                        </a>
                           <ul class="dropdown-menu">

                           @foreach($category as $category)
                        <li>
                        <a href="{{url('cat_search',$category->id)}}">{{$category->category_name}}</a>

                        @endforeach
                           </li>
                        
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('product_page')}}">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('service_page')}}">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('view_post')}}">Bài viết</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact')}}">Liên hệ</a>
                        </li>
                        
                        
                        @if (Route::has('login'))
                        @auth
                        
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">
                           <i class="fas fa-shopping-cart"></i>
                           </a>
                        </li>

                     

                                       <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="accountDropdown">
                     <a class="dropdown-item" href="{{ url('profile')}}">Thông tin tài khoản</a>
                     <a class="dropdown-item" href="{{url('show_order')}}">Thông tin đơn hàng</a>
                     <a class="dropdown-item" href="{{ url('show_booking')}}">Thông tin dịch vụ</a>
                     <form method="POST" action="{{ route('logout') }}" class="d-inline">
                           @csrf
                           <button type="submit" class="dropdown-item">
                              Đăng thoát
                           </button>
                     </form>
                  </div>
</li>
                    

                        @else
                           <li class="nav-item">
                              <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Đăng nhập</a>
                           </li>
                           <li class="nav-item">
                              <a class="btn btn-success" href="{{ route('register') }}">Đăng ký</a>
                           </li>
                        @endauth
                     @endif
                        </ul>
                     </div>
               </nav>
            </div>
         </header>