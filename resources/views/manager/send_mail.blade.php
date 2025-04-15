<!DOCTYPE html>
<html lang="vi">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    <!-- Required meta tags -->
    <style>
  .collapse{
    visibility: initial!important;
  }

  
  .div_center
            {
                text-align: center;
                padding-top: 40px;
                background: skyblue;
                border: 1px solid black;
                padding: 30px;
            }


        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
            color: Black;
            font-weight: bold;
            font-family: Helvetica, sans-serif;
        }

        .text_color
            {
                color: black;
                padding-bottom: 20px;
                width: 600px;
            }


        label
        {
            text-align: left;
            display: inline-block;
            width: 200px;
            color: black;
            font-weight: bold;
            font-family: Helvetica, sans-serif;

        }

        .div_design
        {
            padding-bottom: 15px;
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
       
            <div class="main-panel">
            <div class="content-wrapper">

                <center>

                    <h1 style="font-size:30px; font-weight:bold; font-family:Helvetica; padding:20px; color:black; ">Gửi email đến cho {{$data->name}}</h1>

                    @if(session()->has('message'))
                
                <div class="alert alert-warning">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                    {{session()->get('message')}}
                    

                </div>

                @endif
                
                    <form action="{{url('mail',$data->id)}}"  method="POST" enctype="multipart/form-data">
                    
                    @csrf
    
                    <div class="div_design">
    
                        <label>Lời chào :</label>
                        <input class="text_color" type="text" name="greeting" >
                    
                        </div>
    
                        <div class="div_design">
    
                        <label>Nội dung email</label>
                        <textarea class="text_color" type="text" name="body"  required rows="10" cols="60"></textarea>
                    
                        </div>
    
                        <div class="div_design">
    
                        <label>Văn bản hành động :</label>
                        <input class="text_color" type="text" name="action_text" >
                    
                        </div>


                        <div class="div_design">
    
                        <label>Url hành động :</label>
                        <input class="text_color" type="text" name="action_url"  >
                    
                        </div>
    

                        <div class="div_design">
    
                        <label>Dòng kết thúc :</label>
                        <input class="text_color" type="text" name="endline"  >
                    
                        </div>
    
                        
                        <div class="div_design">
    
                        <input style="margin-top:20px; padding:10px; color:black; font-weight:bold; font-family:Roboto;" type="submit" value ="Gửi mail phản hồi" class ="btn btn-warning">
    
                        </div>
                    </form>
                
                </center>
            
</div>
</div>
</div>

            @include('manager.script')
    <!-- End custom js for this page -->
  </body>
</html>