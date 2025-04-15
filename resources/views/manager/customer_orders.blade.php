<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
    <style>

  .collapse{
    visibility: initial!important;
  }

  <style>
  .font_size
  {
    text-align: center;
    font-size: 35px;
    padding-top: 20px;
    color: black;
    font-weight: bold;
    font-family: Roboto, sans-serif;
    
  }
        .table_deg {
            font-family: Roboto, sans-serif;
            border: 1px solid black;
            width: 80%;
            margin: auto;
            text-align: center;
        }
        .th_deg {
            background: skyblue;
            border: 1px solid black;
        }
        .img_size {
            width: 100px;
            height: 100px;
        }
        th, td {
            font-family: Roboto, sans-serif;
            border: 1px solid black;
        }
        td {
            color: black;
        }
    </style>
</style>
        @include('manager.css')
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

        <h1 class = 'font_size'><h2>

        <table class="table_deg">
            <tr class="th_deg">
                <th>Mã đơn hàng</th>
                <th>Sản phẩm</th>








</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>