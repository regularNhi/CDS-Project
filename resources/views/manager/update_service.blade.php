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
                    <h1 class = 'font_size'>Điều chỉnh thông tin dịch vụ<h2>

                    <form action="{{url('/update_service_confirm',$service->id)}}" method="POST" enctype="multipart/form-data">
                    
                @csrf

                <div class="div_design">

                    <label>Tên dịch vụ :</label>
                    <input class="text_color" type="text" name="title" placeholder="Điền tên dịch vụ" required="" value="{{$service->room_title}}">
                
                    </div>

                    <div class="div_design">

                    <label>Mô tả dịch vụ :</label>
                    <textarea class="text_color" type="text" name="description" placeholder="Điền mô tả dịch vụ" required="">{{$service->description}}</textarea>
                
                    </div>

                    <div class="div_design">

                    <label>Giá :</label>
                    <input class="text_color" type="number" name="price" placeholder="Nhập giá dịch vụ" required="" value="{{$service->price}}">
                
                    </div>

        
                    <div class="div_design">

                    <label>Danh mục dịch vụ : </label>
                    <select class="text_color" name="category" required="">
                        <option value ="{{$service->category}}" selected="">{{$service->category}}</option>
                        
                        @foreach($category as $category)
                        
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach

                    </select>
                
                    </div>

                    <div class="div_design">

                    <label>Hình ảnh dịch vụ hiện tại : </label>
                    <img style="margin:auto;" height="100" width="100" src="/service/{{$service->image}}">

                    </div>

                    <div class="div_design">

                    <label>Đổi hình ảnh dịch vụ : </label>
                    <input type="file" name="image">

                    </div>
                    <div class="div_design">

                    <input type="submit" value ="Cập nhật dịch vụ" class ="btn btn-warning">

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