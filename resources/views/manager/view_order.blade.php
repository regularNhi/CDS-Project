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
    color: black;
    
    
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

          @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
          <h1 class="title_deg"> Quản lý Đơn Hàng </h1>



          <div style="padding-left:400px;padding-bottom:30px;">
        <form action="{{url('search_order')}}" method="get">

        @csrf
        
        <input style="color:black; width:500px;" type="text" name="search_order" placeholder="Tìm kiếm">


        <input type="submit" name="search" class="btn btn-outline-primary" value="Tìm kiếm">
        
          </form>
        </div>



            <table class="table_deg">
                <tr class="th_deg">
                <th>Mã đơn hàng</th>    
                <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng Giá tiền</th>
                    <th>Tình trạng thanh toán</th>
                    <th>Trạng thái giao hàng</th>
                    <th>Giao hàng</th>
                    <th>Hoàn thành</th>
                    <th>In PDF</th>
                    

                    
                
                </tr>

                @forelse($orders as $order_id => $orderGroup)
                <tr>
                <td>{{$order_id}}</td>
                    <td>{{ $orderGroup->first()->name }}</td>
                    <td>{{ $orderGroup->first()->email }}</td>
                    <td>{{$orderGroup->first()->phonenumber}}</td>
                    <td>{{$orderGroup->first()->address}}</td>
                    <td>
                    @foreach($orderGroup as $order)
                        <p>{{ $order->product_title }} (x{{ $order->quantity }})</p> <!-- Hiển thị các sản phẩm trong cùng 1 đơn -->
                    @endforeach
                </td>
                <td>
                  @php
                      $totalQuantity = 0;

                      foreach ($orderGroup as $order) 
                      {
                          $totalQuantity += $order->quantity;
                      }

                  @endphp

                  {{ $totalQuantity }}
                </td>

                <td>
                {{$orderGroup->first()->total_price}}
                </td>

                    <td>{{ $orderGroup->first()->payment_status}}</td>

                    <td>{{ $orderGroup->first()->delivery_status}}</td>


                    <td>
                    @if( $orderGroup->first()->delivery_status == 'Đã hủy đặt hàng')

                    <p style="color: grey;">Không khả dụng</p>

                         @elseif( $orderGroup->first()->delivery_status=='Đang xử lý')
                        <a href="{{url('/delivered',$orderGroup->first()->order_id)}}" onclick="return confirm('Bạn có chắc đơn hàng này đã được giao cho bên vận chuyển?')" class="btn btn-primary">Đã giao</a>
                    
                        @else

                        <p style="color:green; font-weight: bold;">Đã giao cho vận chuyển</p>
                    
                        @endif
                    
                    </td>

                    <td>
                          @if( $orderGroup->first()->delivery_status == 'Đã giao cho vận chuyển')
                              <a href="{{url('/completed', $orderGroup->first()->order_id)}}" 
                                onclick="return confirm('Bạn có chắc muốn hoàn thành đơn hàng này?')" 
                                class="btn btn-success">Hoàn thành</a>
                          @elseif( $orderGroup->first()->delivery_status == 'Đã hoàn thành')
                              <p style="color:green; font-weight: bold;">Đã hoàn thành</p>
                          @endif
                      </td>

                    <td>
                        <a href="{{url('print_pdf',$orderGroup->first()->order_id)}}" class="btn btn-secondary">Print PDF</a>

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