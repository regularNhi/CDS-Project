<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
    <style>
  .collapse{
    visibility: initial!important;
  }

  .title_deg
  {
    font-family: Roboto, sans-serif;
    text-align:center;
    font-size: 35px;
    font-weight: bold;
    padding-bottom: 40px;
    
    
  }
  
  .table_deg
  {
    font-family: Roboto, sans-serif;
    border: 1px solid black; 
    width: 100%;
    margin: auto;
    padding-top: 50px;
    text-align:center;
  }

  .th_deg
  {

    background: skyblue;
    border: 1px solid black;
  }

  .img_size
  {
    width:100px;
    height:100px;
  }

  th,td
  {
    font-family: Roboto, sans-serif;
    border:1px solid black;
  }

  td
  {
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

          <h1 class="title_deg"> Đơn hàng của {{$customer->name}} </h1>

  


            <table class="table_deg">
                <tr class="th_deg">
                <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tình trạng thanh toán</th>
                    <th>Trạng thái giao hàng</th>
                    <th>Hình ảnh</th>
                    <th>Hoàn thành</th>
                   
                    

                    
                
                </tr>

                @forelse($order as $orders)

                <tr>
                    <td>{{$orders->order_id}}</td>
                    <td>{{$orders->name}}</td>
                    <td>{{$orders->email}}</td>
                    <td>{{$orders->phonenumber}}</td>
                    <td>{{$orders->address}}</td>
                    <td>{{$orders->product_title}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>{{$orders->price}}</td>
                    <td>{{$orders->payment_status}}</td>
                    <td>{{$orders->delivery_status}}</td>
                    <td>
                        
                    <img class="img_size" src="/product/{{$orders->image}}">
                
            </td>
            <td>
              @if($orders->delivery_status == 'Đã hoàn thành')
              
              <p style="color:green; font-weight: bold;">Đã hoàn thành</p>

            @endif
            </td>
           
                </tr>
              @empty

              <tr>
                <td colspan="16">
                  Không tìm thấy dữ liệu </td>


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