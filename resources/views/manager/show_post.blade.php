<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    margin: auto;

  }

  

  .th_deg
  {
    font-family: Roboto, sans-serif;
    background: skyblue;
    color: white;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
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

            <h2 class="font_size">Danh sách tin tức/bài viết</h2>
            <div class="div_deg">    
            <table class="center">

                <tr class="th_color">
                    
                    <th class="th_deg">Tiêu đề</th>
                    <th class="th_deg">Nội dung</th>
                    <th class="th_deg">Đăng bởi</th>
                    <th class="th_deg">Trạng thái</th>
                    <th class="th_deg">Loại người dùng</th>
                    <th class="th_deg">Hình ảnh</th>
                    <th class="th_deg">Cập nhật</th>
                    <th class="th_deg">Xóa</th>
                </tr>

                @foreach($post as $posts)

                <tr>
                    
                    <td>{{$posts->title}}</td>
                    <td >{!!Str::limit($posts->description,100)!!}</td>
                    <td>{{$posts->name}}</td>
                    <td>{{$posts->post_status}}</td>
                    <td>{{$posts->usertype}}</td>
                    <td>

                        <img class="img_size" src="/post/{{$posts->image}}">

                    </td>



                    <td>
                      <a class="btn btn-info" href ="{{url('edit_post',$posts->id)}}">Sửa</a>
                    </td>
                    <td>
                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc bạn muốn xóa bỏ?')" href="{{url('delete_post',$posts->id)}}">Xóa</a>
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