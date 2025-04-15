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
                    <h1 class = 'font_size'>Cập nhật Tài Khoản Quản Trị<h2>

                    <form action="{{url('/update_acc',$user->id)}}" method="POST" enctype="multipart/form-data">
                    
                @csrf

                <div class="div_design">

                    <label>Tên Người dùng :</label>
                    <input class="text_color" type="text" name="name" placeholder="Cập nhật tên người dùng" value="{{$user->name}}" required>
                
                    </div>

                    <div class="div_design">

                    <label>Email :</label>
                    <input class="text_color" type="email" name="email" placeholder="Cập nhật email người dùng" value="{{$user->email}}" required>
                
                    </div>


                    <div class="div_design">

                    <label>Số điện thoại :</label>
                    <input class="text_color" type="number" name="phone" placeholder="Cập nhật số điện thoại" value="{{$user->phone}}" required>
                
                    </div>

                    <div class="div_design">

                    <label>Cấp quyền tài khoản :</label>

                    <select class="text_color" name="usertype" required>

                        <option value="{{$user->usertype}}" selected>{{$user->usertype}}</option>

                        <option value="manager">manager</option>
                        <option value="admin">admin</option>
                        
                    </select>
                
                    </div>
 
                    <div class="div_design">

                    <input type="submit" value ="Cập nhật tài khoản" class ="btn btn-warning">

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