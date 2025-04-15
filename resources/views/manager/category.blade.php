<!DOCTYPE html>
<html lang="vi">
  <head>
    <!-- Required meta tags -->
        @include('manager.css')
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
       <style type="text/css">

            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }

            .h2_font
            {
                font-size:35px;
                padding-bottom:40px;
                
                font-family: Roboto, sans-serif;
                font-weight: bold;
            }

            .input_color
            {
                color: black;
                width: 300px;
            }

            .center
            {
                margin: auto;
                width: 50%;
                text-align: left;
                margin-top: 30px;
                border-collapse: collapse;
                border: 1px solid black;
                table-layout: auto;
                color: black;
                
            }
            .center td 
            {
                border: 1px solid black;
                padding: 5px;
                margin: auto;
                font-family: Roboto, sans-serif;
                
            }

            .th_deg
            {  
                font-family: Roboto, sans-serif;
            border: 1px solid black;
            background: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 20px;
            margin-top: 10px;
            text-align: left;
  
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

                <h2 class="h2_font"> Quản lý Danh mục </h2>

                <form action="{{url('/add_category')}}" method="POST">

                    @csrf

                    <input class="input_color" type="text" name="category" placeholder="Điền tên danh mục sản phẩm - dịch vụ">

                    <input type="submit" class="btn btn-primary" name="submit"  value="Thêm">
                </form>

                <table class="center"> 

                <tr>  
                    <th class="th_deg">Tên danh mục sản phẩm - dịch vụ</th>
                    <th class="th_deg" >Thao tác</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->category_name}}</td>

                    <td>
                        <a class ="btn btn-info" href="{{url('edit_category',$data->id)}}">Chỉnh sửa</a>
                        <a onclick="return confirm('Bạn có chắc bạn muốn xóa bỏ?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Xóa</a>
                    </td>
                </tr>

                @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>