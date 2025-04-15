<!DOCTYPE html>
<html lang="vi">
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
        @include('manager.css')

        <style type="text/css">

.font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
            color: Black;
            font-weight: bold;
            font-family: Helvetica, sans-serif;
        }

            .input_color
                {
                    color: black;
                    width: 300px;
                }
            .div_deg
            {
                text-align:center;
                margin:auto;
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
            <div class="row">

                <div class="div_deg">
                <h1 class = 'font_size'>Chỉnh sửa danh mục<h1>

                    <form action="{{url('update_category',$data->id)}}" method="POST">

                    @csrf

                        <label>Tên danh mục:</label>
                        <input class="input_color" type="text" name="cat_name" value="{{$data->category_name}}">

                        <input type="submit" class="btn btn-primary" value="Cập nhật">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>