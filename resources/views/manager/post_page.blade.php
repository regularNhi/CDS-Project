<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
    <style>
  .collapse{
    visibility: initial!important;
  }

  .div_center
            {
                text-align: center;
                padding-top: 40px;
                background: skyblue;
                border: 1px solid black;
                padding: 10px;
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
                width: 700px;
            }


        label
        {
            text-align: left;
            display: inline-block;
            
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
        @include('manager.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
           
      @include('manager.sidebar')
      <!-- partial -->
            @include('manager.header')

            <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
        <!-- partial -->
        <div class="div_center">
                    <h1 class = 'font_size'>Tạo bài viết<h2>

                    <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                    
                @csrf

                <div class="div_design">

                    <label>Tiêu đề :</label>
                    <input class="text_color" type="text" name="title" placeholder="Nhập tiêu đề" required="">
                
                    </div>

                    <div class="div_design">

                    <label>Nội dung :</label>
                    <textarea class="text_color" type="text" name="description" placeholder="Nhập nội dung" required="" rows="15" cols="60"></textarea>
                
                    </div>
                    

                    <div class="div_design">

                    <label>Hình ảnh sản phẩm : </label>
                    <input type="file" name="image" required="">

                    <div class="div_design">

                    <input style="margin-top:20px;" type="submit" value ="Đăng bài" class ="btn btn-warning">

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