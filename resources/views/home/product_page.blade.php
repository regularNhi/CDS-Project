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
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
            
         <!-- end slider section -->
     
      <section class="product_section layout_padding">
   <style>
      .custom_button {
    padding: 5px 10px; /
    font-size: 12px;   /* Giảm kích thước chữ */
    border-radius: 100px; /* Bo tròn góc */
    background-color: #ff7f00; /* Màu cam mặc định */ /* Xóa viền */
    transition: background-color 0.3s ease; /* Hiệu ứng hover */
    width:auto;
    height:auto;
    margin: 0;
    
      }

      h5
      {
         font-family: Roboto, sans-serif;
      }

.custom_button:hover {
    background-color: #e06b00; /* Màu khi di chuột vào */
}
      </style>
         <div class="container">
            <div class="heading_container heading_center">
            
               <h2>
               <span>Sản phẩm </span> cho thú cưng
               </h2>
            </div>
                           @if(session()->has('error'))
                  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                     {{ session()->get('error') }}
                  </div>
               @endif
            @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
            <div class="row">

           
               @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Chi tiết sản phẩm
                           </a>
                          
                           <form action="{{url('add_cart',$products->id)}}" method="post">
                              @csrf

                           <div class="row">

                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1"  min="1" style="width:80px;">
                              </div>

                              <div class="col-md-4">

                                    <input style="width:auto; border-radius:10px;" type="submit" value="Thêm giỏ hàng">
                              </div>

                              </div>

                           </form>

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)
                        
                        <h6 style="color: red;">
                           Giá ưu đãi
                           <br>
                        {{number_format($products->discount_price,0,',','.')}} VNĐ
                        </h6>

                       
                        <h6 style="text-decoration: line-through; color: grey;">
                        Giá gốc
                        <br>
                        {{number_format($products->price,0,',','.')}} VNĐ
                        </h6>

                        @else

                        <h6 style="color: black">
                        Giá
                        <br>
                        {{number_format($products->price,0,',','.')}} VNĐ
                        </h6>

                        @endif
                     </div>
                  </div>
               </div>
               
           @endforeach

         
         </div>
      </section>
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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
