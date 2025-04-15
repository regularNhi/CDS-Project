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

            @if(session()->has('error'))
                  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                     {{ session()->get('error') }}
                  </div>
               @endif

           
            @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif

            <h2 class="font_size">Danh sách người dùng</h2>

            <div class="div_deg">    
            
            <table class="center">
            
                <tr class="th_color">
                    
                    <th class="th_deg">Tên</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Số điện thoại</th>
                    <th class="th_deg">Loại tài khoản</th>
                  
                    <th class="th_deg">Cập nhật</th>
                    <th class="th_deg">Xóa</th>
                </tr>

                @foreach($user as $user)

                <tr>
                    
                    <td>{{$user->name}}</td>
                    <td >{{$user->email}}</td> <!--xóa class="description_col" -->
                    <td>{{$user->phone}}</td>
                    <td>{{$user->usertype}}</td>

                    



                    <td>

                    <a style="margin:10px;" href="{{url('/edit_acc', $user->id) }}" class="btn btn-info">Sửa</a>

                    </td>

                    <td>
                    <a style="margin:10px;" class="btn btn-danger" onclick="showConfirmDeleteModal({{ $user->id }})">Xóa</a>
                    </td>
                </tr>

                @endforeach

                </table>
            <!-- Modal yêu cầu mật khẩu -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ url('confirm_delete_account') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Mời nhập mật khẩu để xác nhận xóa tài khoản quản trị</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input style="width:70%; color:black;" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Hủy</button>
                            <button type="submit" class="btn btn-danger">Xác nhận và Xóa</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
            @include('manager.script')
            <script type="text/javascript">
    function showConfirmDeleteModal(userId) {
        // Đặt userId vào input hidden
        document.getElementById('user_id').value = userId;
        // Hiển thị modal
        $('#confirmDeleteModal').modal('show');
    }
</script>
    <!-- End custom js for this page -->
  </body>
</html>