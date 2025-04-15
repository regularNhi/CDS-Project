<!DOCTYPE html>
<html>
   <head>
    <base href="/public">

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
      <title>Famms - Fashion HTML Template</title>
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
      <style>
        .img-box img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .detail-box
        {
            border: 1px solid #9eb08a;
            border-radius: 15px;
            padding: 30px;
            background: #fff8e5;

        }
        .detail-box h6 {
        margin-top: 10px;
        }

        h5
        {
            color: green;
            font-size: 100px;
            font-family: Roboto, sans-serif;
            font-weight: bold;
        }

        h6
        {
            font-size: 20px;
            padding: 10px;
            font-family: Helvetica, sans-serif;
        }
        .img-fluid
        {
         width: 500px;
         height:500px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area" style="padding: 30px;">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <!-- end slider section -->
      
         <div class="container" style="padding: 30px;">

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
            
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-6">
                    <div class="img-box" style="padding: 20px;">
                        <img src="product/{{$product->image}}" alt="" class="img-fluid">
                    </div>
                </div>

                <!-- Thông tin sản phẩm -->
                <div class="col-md-6">
                    <div class="detail-box">
                        <h5>
                        {{$product->title}}
                        </h5>

                        @if($product->discount_price!=null)
                        <h6 style="color: red;">
                        Giá ưu đãi
                        <br>
                        {{number_format($product->discount_price,0,',','.')}} VNĐ
                        </h6>

                        <h6 style="text-decoration: line-through; color: grey;">
                        Giá gốc
                        <br>
                        {{number_format($product->price,0,',','.')}} VNĐ
                        </h6>
                        @else
                        <h6 style="color: black;">
                        Giá
                        <br>
                        {{number_format($product->price,0,',','.')}} VNĐ
                        </h6>
                        @endif

                        <!-- In đậm các mục như Danh mục, Mô tả, Số lượng -->
                        <h6><strong>Danh mục:</strong> {{$product->category}}</h6>
                        <h6><strong>Mô tả:</strong> {{$product->description}}</h6>
                        <h6><strong>Số lượng có sẵn:</strong> {{$product->quantity}}</h6>

                        <form action="{{url('add_cart',$product->id)}}" method="post">
                              @csrf

                           <div class="row">

                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1"  min="1" max="{{ $product->stock_quantity }}" style="width:100px;">
                              </div>

                              <div class="col-md-04">

                                    <input class="btn btn-warning rounded-pill" type="submit" value="Thêm vào giỏ hàng">
                              </div>

                              </div>

                           </form>
                    </div>
                </div>
            </div>
            </div>


      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
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