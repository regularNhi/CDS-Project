<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use App\Models\Category;

use App\Models\Product;

use App\Models\Service;

use App\Models\Booking;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Contact;

use App\Models\Post;

use App\Models\Comment;

use App\Models\Reply;

use Stripe;

use Session;

use Exception;

class HomeController extends Controller
{


    public function index()
    {
        $category = category::all();
        $product=product::paginate(6);

        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
       if(Auth::id())
       {
        $usertype=Auth()->user()->usertype;

            if($usertype=='user')
            {
                $product=product::paginate(6);

                $comment=comment::all();

                return view('home.userpage',compact('product','comment'));
            }

            else if(in_array($usertype, ['admin', 'manager'])) 
            {
            
                $total_product=product::all()->count();
                $total_service=service::all()->count();
                $total_post=post::all()->count();
                $total_order = Order::distinct('order_id')->count('order_id');
                $total_user=user::all()->count();

                $order=order::all();

                $total_waiting=booking::where('status','=','Chờ xác nhận')->get()->count();

                $total_service_complete=booking::where('status','=','Đã hoàn thành')->get()->count();

                $total_revenue = order::where('delivery_status','=', 'Đã hoàn thành')->sum('price');

                $total_delivered=order::where('delivery_status','=','Đã giao hàng')->get()->count();

                $total_processing=order::where('delivery_status','=','Đang xử lý')->get()->count();

                $total_completed = Order::where('delivery_status', 'Đã hoàn thành')
                ->distinct('order_id')
                ->count('order_id'); 

                return view('manager.Home',compact('total_product','total_service','total_post',
                                                    'total_order','total_user','total_waiting',
                                                    'total_revenue','total_delivered','total_service_complete',
                                                    'total_processing', 'total_completed'));
            }
            
       }
       
                return view('home.userpage');
       
    }


    public function introduce()
    {

        return view('home.intro');
    }

    public function product_page()
    {
        $category = category::all();
        $product=product::all();

        return view('home.product_page', compact('product'));

    }



    public function product_details($id)
    {
        $product=product::find($id);

        return view('home.product_details',compact('product'));
    }


    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
    
            // Lấy thông tin sản phẩm từ database
            $product = product::find($id);
    
            // Lấy số lượng yêu cầu từ request
            $requestedQuantity = $request->quantity;
    
            // Kiểm tra nếu số lượng yêu cầu vượt quá số lượng có sẵn
            if ($requestedQuantity > $product->quantity) {
                return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng có sẵn.');
            }
    
            // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng của user chưa
            $product_exist_id = cart::where('product_id', $id)
                ->where('user_id', $userid)
                ->first(); // Chỉ cần lấy bản ghi đầu tiên
    
            if ($product_exist_id) {
                // Cập nhật số lượng sản phẩm đã có trong giỏ hàng
                $cart = cart::find($product_exist_id->id);
                
                // Số lượng mới là tổng của số lượng cũ và số lượng yêu cầu thêm
                $newQuantity = $cart->quantity + $requestedQuantity;
    
                // Kiểm tra lại số lượng mới có vượt quá số lượng có sẵn không
                if ($newQuantity > $product->quantity) {
                    return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng có sẵn.');
                }
    
                // Cập nhật lại giỏ hàng với số lượng mới
                $cart->quantity = $newQuantity;
    
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $newQuantity;
                } else {
                    $cart->price = $product->price * $newQuantity;
                }
    
                $cart->save();
                return redirect()->back()->with('message', 'Thêm sản phẩm thành công!');
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                $cart = new cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phonenumber = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
    
                $cart->product_title = $product->title;
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $requestedQuantity;
                } else {
                    $cart->price = $product->price * $requestedQuantity;
                }
    
                $cart->image = $product->image;
                $cart->product_id = $product->id;
    
                // Lưu số lượng vào giỏ hàng
                $cart->quantity = $requestedQuantity;
    
                $cart->save();
                return redirect()->back()->with('message', 'Thêm sản phẩm vào giỏ hàng thành công!');
            }
        } else {
            return redirect('login')->with('message', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
  

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
    
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back()->with('message','Xóa sản phẩm thành công!');

    }


    public function confirm_order(Request $request)
    {
        
        $name =$request->name;
        $address =$request->address;
        $phone=$request->phone;

        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        $orderId = Order::max('order_id') + 1;
        while (Order::where('order_id', $orderId)->exists()) {
            $orderId++;
        }

        $totalPrice = 0;
        $shippingFee = 25000;

        foreach($data as $data)
        {

            $order=new order;
            $order->name= $name;//from order table and cart table
            $order->phonenumber=$phone;
            $order->address=$address;

            $order->user_id=$data->user_id;
            $order->email=$data->email;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status="Thanh toán khi nhận hàng";

            $order->delivery_status="Đang xử lý";

       
        $order->order_id = $orderId; 
       

            $order->save();

            $totalPrice += $data->price;

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();

        }

        $finalTotal = $totalPrice + $shippingFee;

        // Cập nhật total_price cho tất cả sản phẩm trong cùng một order_id (cùng đơn hàng)
        Order::where('order_id', $orderId)->first()->update(['total_price' => $finalTotal]);

        return redirect()->back()->with('message','Hệ thống đã ghi nhận đơn hàng của bạn!');

    }


    public function stripe($final_total)
    {   
        return view('home.stripe',compact('final_total'));
    }

    public function stripePost(Request $request, $final_total)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        Stripe\Charge::create ([
                "amount" => $final_total,
                "currency" => "vnd",
                "source" => $request->stripeToken,
                "description" => "Test cổng thanh toán" 
        ]);
    
        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone=Auth::user()->phone;
        
        $user=Auth::user();

        $userid=$user->id;
        
        $data=cart::where('user_id','=',$userid)->get();
        $orderId = Order::max('order_id') + 1;
           

        foreach($data as $data)
        {
            $order=new order;

            $order->name=$name;//from order table and cart table
            $order->phonenumber=$phone;
            $order->address=$address;

            $order->user_id=$data->user_id;
            $order->email=$data->email;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
           

            $order->payment_status="Đã thanh toán qua thẻ";

            $order->delivery_status="Đang xử lý";

            $order->order_id = $orderId; 

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();

        }

        Order::where('order_id', $orderId)->first()->update(['total_price' => $final_total]);

        return redirect('show_cart')->with('message','Hệ thống đã ghi nhận đơn hàng của bạn!');

    }

    public function service_page()
    {
        $category = category::all();
        $service=service::all();
        return view('home.service_page',compact('service'));
    }


    public function service_details($id)
    {

        $service=service::find($id);

        return view('home.service_details',compact('service'));
    }


    public function add_booking(Request $request,$id)
    {
        
        $user=Auth::user();

        $userid=$user->id;
        
        
        
        $data=new Booking;

        $data->service_id = $id;
        
        $data->user_id= $userid;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->date=$request->date;
        $data->time=$request->time;

        $data->save();

        return redirect()->back()->with('message','Hệ thống đã ghi nhận lịch hẹn của bạn!');
    }




    public function edit_profile()
    {
        $user=Auth::user();

        $userid=$user->id;
        return view('home.edit_profile', compact('user'));
        }
            

    
    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        } 

        else
        {
            return redirect('login');
        }

    }
 
    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='Đã hủy đặt hàng';

        $order->save();
        
        return redirect()->back()->with('message','Hệ thống đã hủy thành công đơn hàng!');
    }




    public function show_booking()
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            $data=booking::where('user_id','=',$userid)->get();

          
            return view('home.show_booking',compact('data'));
        }

        else
        {
            return redirect('login');
        }

    }


    public function cancel_book($id)
    {
        $booking=booking::find($id);
        $booking->status='Đã hủy đặt hẹn';

        $booking->save();
        
        return redirect()->back()->with('message','Hệ thống đã hủy lịch hẹn thành công!');
    }





    public function view_post()
    {
        $post=post::all();

        return view('home.view_post',compact('post'));
    }



    public function post_details($id)
    {
        $post=post::find($id);

        $comment = Comment::where('post_id', $id)->get();

        // Không cần lấy tất cả reply, chỉ lấy các reply liên quan đến các comment của post đó
        $reply = Reply::whereIn('comment_id', $comment->pluck('id'))->get();
        
        return view('home.post_details',compact('post','comment','reply'));
    }



    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment=new comment;


            $comment->post_id = $request->post_id;

            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
           
            $comment->comment=$request->comment;
            

            $comment->save();

            return redirect()->back()->with('message','Đăng bình luận thành công!');
        }

        else
        {
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new reply;

            $reply->name=Auth::user()->name;

            $reply->user_id=Auth::user()->id;

            $reply->comment_id=$request->commentId;

            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back()->with('message', 'Trả lời bình luận thành công!');;
        }
        else
        {
            return redirect('login');
        }


    }


    
    public function contact()
    {
        return view('home.contact');
    }

    public function contact_us(Request $request)
    {
        $contact=new contact;

        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->phone= $request->phone;
        $contact->message= $request->message;
        
        $contact->save();

        return redirect()->back()->with('message', 'Gửi thông điệp thành công!');
    }


    public function search(Request $request)
    {

    $category = category::all();

    $search = $request->search;

    // Tìm kiếm sản phẩm
    $product = Product::where('title', 'LIKE', '%' . $search . '%')->get();

    // Tìm kiếm dịch vụ
    $service = Service::where('room_title', 'LIKE', '%' . $search . '%')->get();

    // Chuyển hướng đến trang tổng hợp kết quả tìm kiếm
    return view('home.search', compact('product', 'service','category', 'search'));
    }


    public function cat_search($id)
    {
        $category = category::all();
        
        $product = product::where('cat_id',$id)->get();
 
        $service= service::where('cat_id',$id)->get();
        return view('home.search', compact('product', 'service','category'));
    }


}
