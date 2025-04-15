
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{url('redirect')}}"><img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="{{url('redirect')}}"><img src="{{asset('admin/assets/images/logo-mini.png')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
      
          <li class="nav-item nav-category">
            <span class="nav-link">Điều hướng</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Thống kê số liệu</span>
            </a>

          </li>


          <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#product-menu" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-tag"></i>
              </span>
              <span class="menu-title">Quản lý sản phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Danh sách sản phẩm</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('view_product')}}">Thêm sản phẩm</a></li>
              </ul>
            </div>
            </li>

            
            
            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#service-menu" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-clipboard-text"></i>
              </span>
              <span class="menu-title">Quản lý dịch vụ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="service-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('view_service')}}">Danh sách dịch vụ</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('create_service')}}">Thêm dịch vụ</a></li>
              </ul>
            </div>
            </li>

            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#post-menu" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-pen"></i>
              </span>
              <span class="menu-title">Quản lý bài viết</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('show_post')}}">Danh sách bài viết</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('post_page')}}">Thêm bài viết</a></li>
              </ul>
            </div>
            </li> 


            
            
            

          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_category')}}">
              <span class="menu-icon">
                <i class="mdi mdi-format-list-bulleted-type"></i>
              </span>
              <span class="menu-title">Danh mục SP-Dịch vụ</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-receipt"></i>
              </span>
              <span class="menu-title">Quản lý Đơn hàng</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('bookings')}}">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-check"></i>
              </span>
              <span class="menu-title">Quản lý Đơn đặt dịch vụ</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('all_messages')}}">
              <span class="menu-icon">
                <i class="mdi mdi-email"></i>
              </span>
              <span class="menu-title">Quản lý liên hệ</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#customer-menu" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple-outline"></i>
              </span>
              <span class="menu-title">Quản lý Khách hàng</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/customer_list')}}">Xem khách hàng</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/view_user')}}">Thêm khách hàng</a></li>
              </ul>
            </div>
            </li>



            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#role-menu" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-card-details"></i>
              </span>
              <span class="menu-title">Quản lý Vai trò</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="role-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/show_role')}}">Quản lý phân quyền</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/view_acc')}}">Thêm tài khoản</a></li>
              </ul>
            </div>
            </li>


            <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/chatify')}}">
              <span class="menu-icon">
                <i class="mdi mdi-comment-processing"></i>
              </span>
              <span class="menu-title">Tin nhắn trực tuyến</span>
            </a>
          </li>
           

        </ul>
      </nav>
     