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
                    <h1 class = 'font_size'>Điều chỉnh thông tin sản phẩm<h2>

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    
                @csrf

                <div class="div_design">

                    <label>Tên sản phẩm :</label>
                    <input class="text_color" type="text" name="title" placeholder="Điền tên sản phẩm" required="" value="{{$product->title}}">
                
                    </div>

                    <div class="div_design">

                    <label>Mô tả sản phẩm :</label>
                    <textarea class="text_color" type="text" name="description" placeholder="Điền mô tả sản phẩm" required="" rows="5" cols="15">{{$product->description}}</textarea>
                
                    </div>

                    <div class="div_design">

                    <label>Giá thành :</label>
                    <input class="text_color" type="number" name="price" placeholder="Nhập giá sản phẩm" required="" value="{{$product->price}}">
                
                    </div>

                    <div class="div_design">

                        <label>Giá đã giảm :  </label>
                        <input class="text_color" type="number" name="dis_price" placeholder="Nhập giá đã giảm của sản phẩm" required="" value="{{$product->discount_price}}">

                        </div>

                    <div class="div_design">

                    <label>Số lượng : </label>
                    <input class="text_color" type="number" min="0" name="quantity" placeholder="Nhập số lượng sản phẩm" required="" value="{{$product->quantity}}">
                
                    </div>

                   
                <div class="div_design"> 

                <label>Danh mục sản phẩm : </label>
                    <select class="text_color" name="category" required="">
                        <option value ="{{$product->category}}" selected="">{{$product->category}}</option>
                        
                        @foreach($category as $category)
                        
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach

                    </select>
                
                    </div>

                    <div class="div_design">

                    <label>Hình ảnh sản phẩm hiện tại : </label>
                    <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}">

                    </div>

                    <div class="div_design">

                    <label>Đổi hình ảnh sản phẩm : </label>
                    <input type="file" name="image">

                    </div>
                    <div class="div_design">

                    <input type="submit" value ="Cập nhật sản phẩm" class ="btn btn-warning">

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