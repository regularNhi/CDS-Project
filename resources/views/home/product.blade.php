<section class="product_section layout_padding">
   <style>
      .custom_button {
    padding: 5px 10px; /
    font-size: 12px;   /* Giảm kích thước chữ */
    border-radius: 100px; /* Bo tròn góc */
    background-color: #ff7f00; /* Màu cam mặc định */ /* Xóa viền */
    transition: background-color 0.3s ease; /* Hiệu ứng hover */
    width:auto;
    height:auto;
    margin: 0;
    
      }

.custom_button:hover {
    background-color: #e06b00; /* Màu khi di chuột vào */
}
      </style>
         <div class="container">
         @if(session()->has('error'))
            <div class="alert alert-danger">
               {{ session()->get('error') }}
            </div>
         @endif
            @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
            <div class="heading_container heading_center">
            
               <h2>
               <span>Sản phẩm </span> cho thú cưng
               </h2>
            </div>
            <div class="row">
           
               @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Chi tiết sản phẩm
                           </a>
                          
                           <form action="{{url('add_cart',$products->id)}}" method="post">
                              @csrf

                           <div class="row">

                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1"  min="1" max="{{ $products->quantity }}" style="width:80px;">
                              </div>

                              <div class="col-md-4">

                                    <input style="width:auto; border-radius:10px;" type="submit" value="Thêm giỏ hàng">
                              </div>

                              </div>

                           </form>

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)
                        
                        <h6 style="color: red;">
                           Giá ưu đãi
                           <br>
                        {{number_format($products->discount_price,0,',','.')}} VNĐ
                        </h6>

                       
                        <h6 style="text-decoration: line-through; color: grey;">
                        Giá gốc
                        <br>
                        {{number_format($products->price,0,',','.')}} VNĐ
                        </h6>

                        @else

                        <h6 style="color: black">
                        Giá
                        <br>
                        {{number_format($products->price,0,',','.')}} VNĐ
                        </h6>

                        @endif
                     </div>
                  </div>
               </div>
               
           @endforeach

         
         </div>
      </section>