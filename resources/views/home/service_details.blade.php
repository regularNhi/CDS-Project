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
      
      <!-- Include flatpickr CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

      
      <style>
        .img-box img {
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
        padding:20px;
        background: white;
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
         width: 800px;
         height:300px;
        }

        label
        {
            display:inline-block;
            width:200px;
            font-size: 20px;
            padding:5px;
        }

        input
        {
            
            width:auto;
            text-transform: none;
        }

        #email, #name {
      text-transform: none;
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
         @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif   
         <div class="row">
            
                <!-- Hình ảnh sản phẩm -->
                

                <!-- Thông tin sản phẩm -->
                <div class="col-md-6">
    
                    <div class="detail-box">
                    <div class="img-box" style="padding: 20px;">
                        <img src="service/{{$service->image}}" alt="" class="img-fluid">
                    </div>
                        <h3>
                        {{$service->room_title}}
                        </h3>
                
                        <p style="padding:12px;">
                        {{$service->description}}
                        <br> 
                        <strong style="color: red;">Lưu ý:</strong> <strong>Khi đến cửa hàng sử dụng dịch vụ, quý khách vui lòng mang theo sổ tiêm chủng để đảm bảo quá trình phục vụ diễn ra thuận lợi và nhanh chóng.</strong>
                        </p>

                        <h6>Danh mục: {{$service->category}}</h6>
                        
                        <h6 style="color: black;">
                        Giá dịch vụ
                        <br>
                        {{number_format($service->price,0,',','.')}} VNĐ/ngày
                        </h6>
                       

                        <!-- In đậm các mục như Danh mục, Mô tả, Số lượng -->
                        

                        
                    </div>
                </div>

                <div class="col-md-6">
                    <h1 style="font-size:40px; font-weight: bold;">Đặt hẹn dịch vụ</h1>
                    
                
                    <form action="{{url('add_booking',$service->id)}}" method="Post"> 

                    @csrf
                    
                    <div class="div_deg">    
                        <label>Họ và tên</label>

                        <input type="text" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
                    </div>  

                    <div>    
                        <label>Email</label>

                        <input type="text" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
                    </div>  

                    <div>    
                        <label>Số điện thoại</label>

                        <input type="number" name="phone" @if(Auth::id()) value="{{Auth::user()->phonenumber}}" @endif required>
                    </div>  

                    <div>    
                        <label>Ngày hẹn</label>

                        <input type="date" id="date" name="date" required>
                    </div> 
                    
                    <div>    
                        <label>Giờ đặt hẹn</label>

                        <input type="time" id="time" name="time" required>
                    </div> 

                    <div style="padding">
                    <label style="color: orange; font-weight:bold;">Tôi đã tiêm chủng thú cưng đầy đủ!</label>
                            <input style="width:30px; height:30px;" type="checkbox" name="petVaccination" required>
                               
                    
                    </div>


                    <div style="padding-top:20px;">    
                        <input type="submit" class="btn btn-warning rounded-pill" value="Đặt dịch vụ">
                    </div>  

                    </form>
                    
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
        <!-- Include flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


      <script type="text/javascript">
      $(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#date').attr('min', maxDate);

        });
      
      </script>


<script>
    flatpickr("#time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i", // 24-hour format
        minTime: "10:00",
        maxTime: "18:00"
    });
</script>
      </body>
</html>