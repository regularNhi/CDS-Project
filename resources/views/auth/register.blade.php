<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="Fago Pet, Đăng ký" />
      <meta name="description" content="Trang đăng ký vào hệ thống quản lý của Fago Pet" />
      <meta name="author" content="Fago Pet Team" />
      <title>Fago Pet - Đăng Ký</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Roboto', sans-serif;
            padding:20px;
        }
        .register-box {
            margin-top: 50px;
            max-width: 500px;
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: auto;
        }
        .register-box h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff7f50;
            font-weight: bold;
            font-size:30px;
            font-family: Roboto, sans-serif;
        }
        .form-control {
            border-radius: 5px;
        }

        .already-have-account {
            text-align: right;
            margin-top: 10px;
        }
        .already-have-account a {
            color: grey;
        }
        .already-have-account a:hover {
            text-decoration: underline;
        }
        input {
      text-transform: none;
   }
   #name, #email, #phone, #address, #password, #password_confirmation {
      text-transform: none;
   }
      </style>
   </head>
   <body>

      <div class="hero_area">
         <!-- header section -->
         
         <header class="header_section">
            <div class="container">   
             <!-- <nav class="navbar navbar-expand-lg custom_nav-container "> -->
              <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form> </span>
                  </button>
                  <nav class="navbar navbar-expand-lg custom_nav-container " style="background: #9fc5e8; border-radius: 8px;">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                     <ul class="navbar-nav" >
                        
                        <li class="nav-item active">
                           <a class="nav-link" href="">Giới thiệu <span class="sr-only">(current)</span></a>
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
                        </div>
               </nav>
            </div>
         </header>
         <!-- header section ends -->
    
         <!-- Register form section -->
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8">
                  <div class="register-box">
                     <h3>Fago Pet- Đăng Ký</h3>
                     
                     <!-- Register Form -->
                     <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="form-group">
                           <label for="name">{{ __('Tên người dùng') }}</label>
                           <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                           <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Input -->
                        <div class="form-group mt-3">
                           <label for="email">{{ __('Email') }}</label>
                           <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone Number Input -->
                        <div class="form-group mt-3">
                           <label for="phone">{{ __('Số điện thoại') }}</label>
                           <input id="phone" class="form-control" type="number" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
                           <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Address Input -->
                        <div class="form-group mt-3">
                           <label for="address">{{ __('Địa chỉ') }}</label>
                           <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" />
                           <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Password Input -->
                        <div class="form-group mt-3">
                           <label for="password">{{ __('Mật khẩu') }}</label>
                           <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="form-group mt-3">
                           <label for="password_confirmation">{{ __('Xác nhận mật khẩu') }}</label>
                           <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                           <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                           <button type="submit" class="btn btn-primary btn-block">{{ __('Đăng ký') }}</button>
                        </div>

                        <!-- Already Have Account Link -->
                        <div class="already-have-account">
                           <a href="{{ route('login') }}">{{ __('Bạn đã có tài khoản?') }}</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end Register form section -->

         @include('home.footer')
      </div>

      <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
