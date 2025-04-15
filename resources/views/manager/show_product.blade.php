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

            <h2 class="font_size">Danh sách sản phẩm</h2>

            
            <div style="margin-left: 300px; padding-top:30px;">
        <form action="{{ url('search_product') }}" method="GET">

        @csrf
        
        <input style="color:black; width:500px;" type="text" name="search_product" placeholder="Tìm kiếm sản phẩm">


        <input type="submit" name="search" class="btn btn-outline-primary" value="Tìm kiếm">
        
          </form>
        </div>
        
            <div class="div_deg">    

            
            <table class="center">

                <tr class="th_color">
                    
                    <th class="th_deg">Tên</th>
                    <th class="th_deg description_col">Mô tả</th>
                    <th class="th_deg">Số lượng</th>
                    <th class="th_deg">Danh mục</th>
                    <th class="th_deg">Giá thành</th>
                    <th class="th_deg">Giá đã giảm</th>
                    <th class="th_deg">Hình ảnh</th>
                    <th class="th_deg">Cập nhật</th>
                    <th class="th_deg">Xóa</th>
                </tr>

                @forelse($product as $products)

                <tr>
                    
                    <td>{{$products->title}}</td>
                    <td >{!!Str::limit($products->description,50)!!}</td> <!--xóa class="description_col" -->
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->category}}</td>
                    <td>{{number_format($products->price,0,',','.')}} VNĐ</td>
                    <td>{{number_format($products->discount_price,0,',','.')}} VNĐ</td>
                    <td>

                        <img class="img_size" src="/product/{{$products->image}}">

                    </td>

                    <td>
                      <a class="btn btn-info" href ="{{url('update_product',$products->id)}}">Sửa</a>
                    </td>
                    <td>
                      <a class="btn btn-danger" onclick="return confirm('Bạn có chắc bạn muốn xóa bỏ?')" href="{{url('delete_product',$products->id)}}">Xóa</a>
                    </td>
                </tr>
                
                @empty
                <tr>
                    <td colspan="9" style="text-align:center; color:red;">Không tìm thấy sản phẩm nào phù hợp.</td>
                </tr>
                @endforelse

                </table>

                
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>