

<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Fago Pet - Trang Sản Phẩm và Dịch vụ</title>
      
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="{{ asset('js/app.js') }}"></script>
      <!-- jQuery (Bootstrap requires jQuery) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!-- font -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      
<style type="text/css">
      .containter-fluid
      {
         position: relative;
         z-index: 1;
      }
      .navbar 
      {
         position: relative;
         z-index: 1;
      }

   </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
         <div class="container">
         @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif   
                
    <x-slot name="header">
    <a class="navbar-brand" href="{{url('/redirect')}}"><img width="250" src="{{ asset('images/logo.png') }}" alt="#" /></a>
        <h2 style="text-transform:uppercase; padding:20px;" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name }}
        </h2>

        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    {{ __('Đăng xuất') }}
                </button>
            </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

           
        </div>
    </div>
    </div>
    
</div>

         
<div style="padding: 20px;">

    </div>
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="#">Fago Pet</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">NNhi</a>
         
         </p>
      </div>

      <script type="text/javascript">
         function reply(caller)
         {
            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();
         }

         function reply_close(caller)
         {

            $('.replyDiv').hide();
         }
         </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      
   </body>
</html>