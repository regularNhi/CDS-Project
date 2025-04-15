<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <style>

  .center
  {
    margin: auto;
    width: 90%;
    border: 1px solid dark;
    text-align: center;
    margin-top: 30px;
    
  }

  .font_size
  {
    text-align: center;
    font-size: 35px;
    padding-top: 20px;
    color: black;
    font-weight: bold;
    font-family: Roboto, sans-serif;
    
  }

  .div_deg
  {
    display:flex;
    justify-content: center;
    align-items: center;
    margin-top: 60px;
  }
  .img_size
  {
    width:150px;
    height: 150px;

  }

  

  .th_deg
  {
    font-family: Roboto, sans-serif;
    background: skyblue;
    color: white;
    font-size: 20px;
    font-weight: bold;
    padding: 15px;
    text-align: left;
    border: 1px solid black;
  }

  td
  {
    border: 1px solid black;
    text-align: center;
    color: black;
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

            @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif

            <h2 class="font_size">Danh sách liên hệ từ Khách hàng</h2>
            <div class="div_deg">    
            <table class="center">

                <tr class="th_color">
                    
                    <th class="th_deg">Tên</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Số điện thoại</th>
                    <th class="th_deg">Thông điệp</th>
                    <th class="th_deg">Gửi email</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    
                    <td>{{$data->name}}</td>
                    <td >{{$data->email}}</td> <!--xóa class="description_col" -->
                    <td>{{$data->phone}}</td>
                    <td>{{$data->message}}</td>
                    <td>

                    <a style="margin:10px;" class="btn btn-primary" href="{{url('send_mail',$data->id)}}">Gửi mail</a>
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