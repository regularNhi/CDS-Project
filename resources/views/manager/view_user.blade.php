<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
        @include('manager.css')
        <style> 

        .div_center
            {
                text-align: center;
                padding-top: 40px;
                background: skyblue;
                border: 1px solid black;
            }


        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
            color: Black;
            font-weight: bold;
            font-family: Helvetica, sans-serif;
        }

        .text_color
            {
                color: black;
                padding-bottom: 20px;
                width: 300px;
            }


        label
        {
            text-align: left;
            display: inline-block;
            width: 200px;
            color: black;
            font-weight: bold;
            font-family: Helvetica, sans-serif;

        }

        .div_design
        {
            padding-bottom: 15px;
        }
        
        img {
        max-width: 200px; /* Giới hạn chiều rộng tối đa */
        max-height: 200px; /* Giới hạn chiều cao tối đa */
        object-fit: cover; /* Đảm bảo ảnh giữ tỷ lệ */
        }
        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
           
      @include('manager.sidebar')
      <!-- partial -->
            @include('manager.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            
            @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
                <div class="div_center">
                    <h1 class = 'font_size'>Thêm Khách hàng<h2>

                    <form action="{{url('/add_user')}}" method="POST" enctype="multipart/form-data">
                    
                @csrf

                <div class="div_design">

                    <label>Tên Khách hàng :</label>
                    <input class="text_color" type="text" name="name" placeholder="Điền tên khách hàng" required="">
                
                    </div>

                    <div class="div_design">

                    <label>Email :</label>
                    <input class="text_color" type="email" name="email" placeholder="Điền email khách hàng" required="">
                
                    </div>


                    <div class="div_design">

                    <label>Địa chỉ :</label>
                    <input class="text_color" type="text" name="address" placeholder="Điền địa chỉ của khách (nếu có)">
                
                    </div>

                    <div class="div_design">

                    <label>Số điện thoại :</label>
                    <input class="text_color" type="number" name="phone" placeholder="Nhập số điện thoại" required>
                
                    </div>

 
                    <div class="div_design">

                    <input type="submit" value ="Thêm khách hàng" class ="btn btn-warning">

                    </div>

                </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>