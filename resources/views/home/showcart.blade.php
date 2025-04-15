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
      <style>
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        text-align: center;
        margin: auto;
        width:80%;
        padding: 15px;

    }
    table
    {
        width: 100%;
        margin-bottom: 20px;
        padding:10px;
    }

    table,th,td
    {
        font-family: Roboto, sans-serif;
        border: 1px solid green;
    }

    .th_deg
    {
        font-size: 15px;
        padding: 10px;
        background: skyblue;
    }

    .img_deg
    {
        height: 100px;
        width: 100px;
    }

    .total_deg{
        font-size:25px;
        padding:15px;
        text-align: center;
        margin-bottom:15px;
        font-weight: bold;
        font-family: Roboto, sans-serif;
        color: orange;
    }

    .order_deg
    {
        padding: 50px;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        
    }
    label
        {
            text-align: left;
            display: inline-block;
            width: 150px;
            color: black;
            font-weight: bold;
            font-family: Roboto, sans-serif;

        }

    .div_gap
    {
        padding 20px
    }
    
    
        </style>
    

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
           
         <!-- end slider section -->
      <!-- why section -->
      <div class="container">
      @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>
                @endif

      <div class="heading_container heading_center">
      
      
                
        <div class="div_deg">

                <table>
                    <tr>
                        <th class="th_deg">Tên sản phẩm</th>
                        <th class="th_deg">Số lượng</th>
                        <th class="th_deg">Giá</th>
                        <th class="th_deg">Hình ảnh</th>
                        <th class="th_deg">Thao tác</th>


                    </tr>

                    <?php $totalprice=0; 
                    $shipping_fee = 25000;
                    ?>
                    
                    @foreach($cart as $cart)
                    <tr>
                        <td>{{$cart->product_title}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{number_format($cart->price,0,',','.')}} VNĐ</td>
                        <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
                        <td>
                            
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" href="{{url('/remove_cart',$cart->id)}}">Xóa sản phẩm</a>
                    
                    </td>
                    </tr>

                    <?php  $totalprice= $totalprice + $cart->price ?>

                @endforeach

             
                </table>
                </div>
                @if($totalprice > 0)
                        <div>
                            <h2 style="font-weight: bold; font-size:20px;"> Phí vận chuyển: {{number_format($shipping_fee, 0, ',', '.')}} VNĐ </h2>
                        </div>
                        <?php $final_total = $totalprice + $shipping_fee; ?>
                    @else
                        <?php $final_total = 0; ?>
                    @endif
                    
                    <div>
                        
                    <h1 class="total_deg"> Tổng thanh toán:   {{number_format($final_total,0,',','.')}} VNĐ </h1>
                    </div>

                   

                    <div class="order_deg" style="display: flex; justify-content: center, align-item:center;">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf

                <div class="div_gap">
                <label>Tên người nhận</label>
                
                <input type="text" name="name" value="{{Auth::user()->name}}">

                </div>

                <div class="div_gap">
                <label>Địa chỉ người nhận</label>
                
                <textarea name="address" required="">{{Auth::user()->address}}</textarea>

                </div>
                <div class="div_gap">
                <label>Số điện thoại</label>
                
                <input class="input_deg" type="number" name="phone" value="{{Auth::user()->phone}}" required>
                <div class="d-flex flex-column align-items-center">

                <h1 style="font-weight:bold; font-size:20px; padding-bottom:5px; text-align:center; font-family: Roboto, sans-serif; color: red;">Chọn phương thức thanh toán</h1><br>

                <div class="d-flex flex-column align-items-center">
                    <input class="btn btn-primary" type="submit" style="display: block; width: 100%; margin-bottom: 10px;align:center;" value="Thanh toán khi nhận hàng">
                        
                    <a class="btn btn-warning" href="{{url('stripe', $final_total)}}"  style="display: block; width: 100%; font-weight:bold; margin-bottom:30px;">Thanh Toán Qua Thẻ</a>
                </div>
                </form>
               
            </div>
                </div>
        </div>
      
      <!-- footer start -->
       
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://fagopet.vn/">Fago Pet</a><br>
         
         
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