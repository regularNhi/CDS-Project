<!DOCTYPE html>
<html>
<head>
   <base href="/public">
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
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <style>
      /* Custom styles for better text alignment and layout */
      
      
      body {
         font-family: 'Roboto', sans-serif;
      }
      .detail-box {
         margin: auto;
         
         text-align: justify; /* Canh đều hai bên */
         line-height: 1.6; /* Tăng chiều cao dòng cho dễ đọc */
         margin: 20px 0; /* Khoảng cách phía trên và dưới */
         padding:20px; /* Tạo khoảng cách bên trong */
      }
      .detail-box img {
         margin: auto;
         margin-bottom: 20px; /* Khoảng cách dưới hình ảnh */
      }
      .detail-box p {
         margin: auto;
         font-size: 18px; /* Kích thước chữ */
         margin-bottom: 20px; /* Khoảng cách giữa các đoạn văn */
      }
      .posted-by {
         
         color: green;
         font-weight: bold;
    /* Khoảng cách phía trên */
         text-align: right;
      }
    
   </style>
</head>
<body>
   <div class="hero_area">
      <!-- header section strats -->
      @include('home.header')
      <!-- end header section -->
      <div class="container" style="padding: 30px;">
      @if(session()->has('message'))
                
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif   

      <div style="margin: auto;" class="row">
      <div class="detail-box">
         <img style="display: block; margin-left: auto; margin-right: auto; padding-bottom: 20px; width: 50%; height: 50%;" src="post/{{$post->image}}" alt="">
         <div style="text-align: center;" class="col-md-12">
            <div class="detail-box">
               <h2 style="text-align:center;"><b>{{$post->title}}</b></h2>
               <p style="font-size: 15px;"> {{$post->description}}</p><br>
               <p class="posted-by">Được đăng bởi <b>{{$post->name}}</b></p>
            </div>
         </div>
      </div>
      </div>

<!-- Phần comment -->
      <div style="text-align: center; padding-bottom: 30px;">

         <h1 style="font-weight: bold;font-size: 30px; color: orange; text-align: center; padding-top:20px; padding-bottom: 20px;">Bình luận</h1>

         <form action="{{url('add_comment')}}" method="POST">

         @csrf

         <input type="hidden" name="post_id" value="{{ $post->id }}">

         <textarea style="height:150px; width:600px;" placeholder="Để lại cảm nhận của bạn tại đây" name="comment"></textarea>

         <br>

         <input  style="padding:10px; width:100px; " type="submit" class="btn btn-primary" value="Gửi">


   </form>

   </div>

<div style="padding-left:20%">

      <h1 style="font-weight: bold;font-size: 20px; padding-bottom: 20px;color: orange;">Tất cả bình luận</h1>

      @foreach($comment as $comment) 

       @if($comment->post_id == $post->id)  

    <div>

        <b>{{ $comment->name }}</b> <small style="padding-left:20px">{{ $comment->created_at }}</small>

        <p style="padding-top:10px;">{{ $comment->comment }}</p>

        <a style="font-weight: bold;" href="javascript:void(0);" onClick="reply(this)" data-Commentid="{{ $comment->id }}">Trả lời</a>

            @foreach($reply as $rep)

                  @if($rep->comment_id == $comment->id)

            <div style="padding-left: 5%; padding-bottom:10px; padding-top:10px;">

                <b>{{ $rep->name }}</b><small style="padding-left:20px">{{ $comment->created_at }}</small>

                <p>{{ $rep->reply }}</p>

                <a style="font-weight: bold;" href="javascript:void(0);" onClick="reply(this)" data-Commentid="{{ $comment->id }}">Trả lời</a>
            </div>

                  @endif

            @endforeach
    </div>
         @endif
         
         @endforeach
         <!-- Reply textbox -->

         <div style="display: none;" class="replyDiv">

         <form action="{{url('add_reply')}}" method="POST" >

         @csrf
        
         

         <input type="text" id="commentId" name="commentId" hidden="">

         <textarea style="100px; width:500px;" placeholder="Viết gì đó" name="reply"></textarea>

         <br>

            <button type="submit" class="btn btn-warning">Gửi</button>

            <a href="javascript::void(0);" class="btn" onClick="reply_close(this)">Đóng</a>

         </form>
         
      </div>

   </div>
   
<!-- Phần comment -->
      </div>
   </div>
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="#">Fago Pet</a><br>
         Distributed By <a href="https://themewagon.com/" target="_blank">NNhi</a>
         </p>
      </div>
      <script type="text/javascript">

         function reply(caller) 
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }
         function reply_close(caller) {
            $('.replyDiv').hide();

         }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
