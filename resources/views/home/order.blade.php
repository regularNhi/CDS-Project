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
      <style type="text/css">

    .center
    {
        margin: auto;
        width: 70%;
        padding:30px;
        text-align: center;
    }

    table,th,td
    {
        border: 1px solid black;
    }

    .th_deg
    {
        padding:10px;
        background: skyblue;
        font-size: 20px;
        font-weight: bold;
    }

    
    
    </style>
   </head>
   <body>
         <!-- header section strats -->
            @include('home.header')
         
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

            <div class="center">

                <table >
                    <tr>
                        
                        <th class="th_deg">Tên sản phẩm</th>
                        <th class="th_deg">Số lượng</th>
                        <th class="th_deg">Giá tiền</th>
                        <th class="th_deg">Trạng thái thanh toán</th>
                        <th class="th_deg">Trạng thái giao hàng</th>
                        <th class="th_deg">Hình ảnh</th>
                        <th class="th_deg">Hủy đặt hàng</th>
                    
                    </tr>


                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>

                        <td>
                            <img height="100" width="100" src="product/{{$order->image}}">
                        </td>

                        <td>

                        @if($order->delivery_status=='Đang xử lý')
                        <a onclick="return confirm('Bạn có chắc chắn hủy đặt hàng?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Hủy đặt</a>
                        

                        @else

                        <p style="color: grey;">Không khả dụng</p>

                        @endif

                        </td>
                    </tr>

                    @endforeach
                    </table>

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