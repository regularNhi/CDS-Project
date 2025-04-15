<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Fago Pet - Trang Sản Phẩm và Dịch vụ</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="{{ asset('js/app.js') }}"></script>
      <!-- jQuery (Bootstrap requires jQuery) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!-- font -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
      
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
      <!--  contact -->
            <div class="heading_container heading_center">
             
               <h2>
               <span>Liên hệ</span> với chúng tôi 
               </h2>
            </div>

      <div class="contact">
         <div class="container">
         @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif 
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form" action="{{url('contact_us')}}" method="Post">

                  @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Họ và tên" type="type" name="name" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="email" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Số điện thoại" type="type" name="phone" required>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Nội dung" type="type" name="message" required></textarea>
                        </div>
                        <div class="col-md-12">
                        <input class="btn btn-primary" type="submit" style="display: block; width: 50%; margin-bottom: 30px;align:center;" value="Gửi">
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.146399721457!2d106.64588317497923!3d10.800097258756772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529100533107d%3A0xaacec42303b516cc!2zS2jDoWNoIHPhuqFuIGNow7MgbcOobyBGYWdvcGV0!5e0!3m2!1svi!2s!4v1726749558612!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
         

        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="#">Fago Pet</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">NNhi</a>
         
         </p>
      </div>

      <!-- <script type="text/javascript">
         function reply(caller)
         {
            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();
         }

         function reply_close(caller)
         {

            $('.replyDiv').hide();
         }
         </script> -->
      <!-- jQery -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>