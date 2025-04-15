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
    padding-bottom: 10px;
    
    
  }

  .div_deg
  {
    display:flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
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
    padding: 10px;
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
    padding:10px;
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
          <h1 class="title_deg"> Quản lý Đơn Dịch Vụ </h1>
          

        <div class="div_deg">


            <table class="table_deg">
                <tr class="th_deg">
                <th>Mã dịch vụ</th>    
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th> 
                <th>Dịch vụ</th>
                <th>Ngày hẹn</th>
                <th>Giờ hẹn</th>
                <th>Trạng thái</th>
                <th>Giá</th>
                <th>Xác nhận</th>
                <th>Hoàn thành</th>
                
         
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->service_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->service->room_title}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->time}}</td>
                    <td>
                        @if($data->status == 'Đã xác nhận lịch hẹn')     

                            <span style="color: blue;">Đã xác nhận</span>
                            
                        @endif

                        @if($data->status == 'Đã hủy đặt hẹn')    

                            <span style="color: red;">Đã bị hủy</span>

                            
                        @endif

                        @if($data->status == 'Chờ xác nhận')    

                            <span style="color: yellow;">Chờ xác nhận</span>

                            
                        @endif

                        @if($data->status == 'Đã hoàn thành')    

                        <span style="color: green; font-weight: bold;">Đã hoàn thành</span>


                        @endif


                    </td>
                    <td>{{$data->service->price}}</td>
                    


                    <td>
                      @if($data->status == 'Đã hủy đặt hẹn')
                          <p style="color: grey;">Không khả dụng</p>
                      @elseif($data->status == 'Chờ xác nhận')
                          <a href="{{url('approve_book',$data->id)}}" onclick="return confirm('Bạn có chắc xác nhận lịch hẹn này?')" class="btn btn-info">Xác nhận</a>
                      @else
                          <p style="color: blue; font-weight: bold;">Đã xác nhận lịch hẹn</p>
                      @endif
                    </td>

                    <td>
                          @if($data->status == 'Đã xác nhận lịch hẹn')

                              <a style="padding:5px;" href="{{url('complete_booking', $data->id)}}" 
                                onclick="return confirm('Bạn có chắc muốn hoàn thành đơn dịch vụ này?')" 
                                class="btn btn-success">Hoàn thành</a>


                          @elseif($data->status == 'Đã hoàn thành')

                              <p style="color:green; font-weight: bold;">Đã hoàn thành</p>

                          @endif
                      </td>


                </tr>
              @endforeach

           
            </table>

</div>
        
        </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>