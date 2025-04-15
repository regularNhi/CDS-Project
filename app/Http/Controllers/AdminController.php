<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Notification;

use App\Models\Category;

use App\Models\Product;

use App\Models\Service;

use App\Models\Contact;

use App\Models\Order;

use App\Models\User; 
 
use App\Models\Post;

use PDF;

use App\Models\Booking;

use App\Notifications\ContactNotification;

use App\Notifications\OrderShippedNotification;





class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id()&& (Auth::User()->usertype == 'manager'))
        {
            $data=category::all();

            return view('manager.category',compact('data'));
        }

       else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }
    }
    
    public function add_category(Request $request)
    {
        if(Auth::id()&& (Auth::User()->usertype == 'manager'))
        {
        $data=new category;
        
        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Thêm danh mục sản phẩm - dịch vụ thành công!');
        }

        else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }

    }

    public function delete_category($id)
    {   
        if(Auth::id()&& (Auth::User()->usertype == 'manager'))
        {
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Xóa danh mục thành công!');
        }

        else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }
    }

    public function edit_category($id)
    {
        if(Auth::id()&& (Auth::User()->usertype == 'manager'))
        {
        $data=category::find($id);

        return view('manager.edit_category',compact('data'));
        }

        else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }
    }

    public function update_category(Request $request,$id)
    {
        if(Auth::id()&& (Auth::User()->usertype == 'manager'))
        {
            $data=category::find($id);
            $data->category_name = $request->cat_name;
            $data->save();

            return redirect('/view_category')->with('message','Điều chỉnh danh mục thành công!');
        }
        else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }
    }



    // chức năng chung


    public function view_product()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
            
            $category= category::all();
            return view('manager.product',compact('category'));
        }

        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
        
    }

    public function add_product(Request $request)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {

        $product = new product;

        $category = Category::where('category_name', $request->category)->first();
        if ($category) {
            $product->cat_id = $category->id;
        }

        

            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $product->quantity=$request->quantity;
            $product->category=$request->category;


            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('product',$imagename);
            
            $product->image=$imagename;

            $product->save();

            return redirect()->back()->with('message','Thêm sản phẩm thành công!');
        }
        
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function show_product()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $product = product::paginate(6);
        
        $product=product::all();
        return view('manager.show_product', compact('product'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }

    public function delete_product($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Xóa sản phẩm thành công!');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }

    public function update_product($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $product=product::find($id);
        $category = category::all();
        return view('manager.update_product',compact('product','category'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }

    public function update_product_confirm(Request $request, $id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        
        
        $image=$request->image;
            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imagename);

                $product->image=$imagename;
            }
        
        $product->save();

        return redirect()->back()->with('message','Cập nhật sản phẩm thành công!');
        }
        else
        {
            abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
        }

    }

    public function create_service()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $category= category::all();
        return view('manager.create_service',compact('category'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function add_service(Request $request)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $data = new service;

        $category = Category::where('category_name', $request->category)->first();
        if ($category) {
            $data->cat_id = $category->id;
        }


        $data->room_title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        
        $data->category=$request->category;

            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('service',$imagename);
            
            $data->image=$imagename;

            $data->save();

            return redirect()->back()->with('message','Thêm dịch vụ thành công!');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }

    public function view_service()

    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $service=service::all();
        return view('manager.view_service',compact('service'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }



    public function delete_service($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $service=service::find($id);

        $service->delete();

        return redirect()->back()->with('message','Xóa dịch vụ thành công!');
        }
        else
       {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
       }
    }


    public function update_service($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $service=service::find($id);
        $category = category::all();
        return view('manager.update_service',compact('service','category'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }

    public function update_service_confirm(Request $request, $id)
    { 
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $service=service::find($id);
        $service->room_title=$request->title;
        $service->description=$request->description;
        $service->price=$request->price;
       
        $service->category=$request->category;
        
        
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('service',$imagename);

            $service->image=$imagename;
        }
        
        $service->save();

        return redirect()->back()->with('message','Cập nhật dịch vụ thành công!');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }


    public function post_page()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $post= post::all();
        return view('manager.post_page');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }



    public function add_post(Request $request)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $user=Auth()->user();

        $user_id = $user->id;

        $name = $user->name;

        $usertype = $user->usertype;


        $post=new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $post->post_status = 'Đang hoạt động';

        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;

        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('post',$imagename);
            
            $post->image=$imagename;
        }
        $post->save();
        

        return redirect()->back()->with('message','Thêm bài viết thành công!');
    }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function show_post()
    { 
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $post=post::all();
        return view('manager.show_post',compact('post'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }



    public function delete_post($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $post=post::find($id);

        $post->delete();

        return redirect()->back()->with('message','Xóa bài viết/tin tức thành công!');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }


    public function edit_post($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $post=post::find($id);
        
        return view('manager.edit_post',compact('post',));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function update_post(Request $request, $id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $post=post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
       
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('post',$imagename);

            $post->image=$imagename;
        }
        
        $post->save();

        return redirect()->back()->with('message','Cập nhật bài viết/tin tức thành công!');
    }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }



    public function view_order()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
            $orders = Order::all()->groupBy('order_id');
 
            
        return view('manager.view_order', compact('orders'));

       
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    
    }


    public function delivered($order_id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        
        $orderGroup = Order::where('order_id', $order_id)->get();
        

    foreach ($orderGroup as $order) 
    {
        $order->delivery_status = 'Đã giao cho vận chuyển';
        $order->save();
    }

    // Gửi thông báo cho khách hàng
    Notification::route('mail', $orderGroup->first()->email)
                ->notify(new OrderShippedNotification($order_id, $orderGroup));

    return redirect()->back()->with('message', 'Đơn hàng đã được giao cho vận chuyển và đã thông báo đến khách hàng');
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }


    public function completeOrder($order_id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $orderGroup = Order::where('order_id', $order_id)->get();
        
            foreach ($orderGroup as $order) 
            {
                $order->delivery_status = 'Đã hoàn thành';
                $order->save();
            }

        return redirect()->back()->with('message', 'Đơn hàng đã được hoàn thành thành công!');
        }
        else
        {
            abort(403, 'Bạn không có quyền truy cập');
        }
    }

    
    public function completeBooking($id)
    {
   
        $data = booking::find($id);
        
        $data->status = 'Đã hoàn thành';
        $data->save();

        return redirect()->back()->with('message', 'Dịch vụ đã được hoàn thành thành công!');
    }




    public function print_pdf($order_id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $orders = Order::where('order_id', $order_id)->get();

        $customerName = $orders->first()->name;

        $pdf=PDF::loadView('manager.pdf',compact('orders'));

        $pdfFileName = 'don_hang_cua_' . preg_replace('/\s+/', '_', $customerName) . '.pdf';

        return $pdf->download($pdfFileName);
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }




    public function bookings()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
    

        $data=Booking::all();
        
        


        return view('manager.bookings',compact('data'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function approve_book($id)
    { 
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {

        $booking = booking::find($id);
        
        $booking->status = 'Đã xác nhận lịch hẹn';

        $booking->save();
    
        return redirect()->back()->with('message', 'Lịch hẹn đã được xác nhận thành công!');;
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function reject_book($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $booking = booking::find($id);
        
        $booking->status = 'Lịch hẹn bị từ chối';

        $booking->save();
    
        return redirect()->back();
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function all_messages()
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $data=contact::all();

        return view('manager.all_message',compact('data'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function send_mail($id)
    {
        if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
        {
        $data=contact::find($id);
           

        return view('manager.send_mail',compact('data'));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }



    public function contact_mail(Request $request, $id)
    {

        $data= Contact::find($id);


        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'action_text' => $request->action_text,

            'action_url' => $request->action_url,

            'endline' => $request->endline,

        ];


        Notification::send($data, new ContactNotification($details));

        return redirect()->back()->with('message', 'Gửi phản hồi thành công!');;
    }
    

    
    public function customer_list()
    {
        if(Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin']))
        {
            $customer = user::where('usertype', 'user')->get();
            return view('manager.customer_list', compact('customer'));

        }
        
        else
        {
         abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
        }
       
    }


    public function view_user()
    {
        if(Auth::id() && (Auth::User()->usertype == 'manager'))
        {

        return view('manager.view_user');
        }

        else
        {
            abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
        }

    }

    public function add_user(Request $request)
    {
        if(Auth::id() && (Auth::User()->usertype == 'manager'))
        {
            $customer = new user;

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->password = bcrypt('12345678'); 
        $customer->usertype = 'user'; 

        $customer->save();

        return redirect()->back()->with('message', 'Thêm khách hàng thành công!');


        }
        else
        {
            abort(403, 'Bạn không có quyền truy cập');

        }
    }


    public function edit_customer($id)
    {
        if (Auth::id() && (Auth::user()->usertype == 'manager')) 
        {
        $customer=user::find($id);
        
        return view('manager.edit_customer',compact('customer',));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function update_customer(Request $request, $id)
    {
        if (Auth::id() && (Auth::user()->usertype == 'manager')) 
        {
        $customer=user::find($id);
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->phone=$request->phone;
        
        $customer->save();

        return redirect()->back()->with('message','Cập nhật thông tin khách hàng thành công!');
    }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }



    public function confirm_delete_customer(Request $request)
{
    
    if (Auth::id() && (Auth::user()->usertype == 'manager')) 
    {
        // Lấy mật khẩu của người quản lý từ yêu cầu
        $password = $request->password;

        // Xác minh mật khẩu có chính xác không
        if (Hash::check($password, Auth::user()->password)) {
            $customer = User::find($request->customer_id);

            if ($customer) {
                $customer->delete();
                return redirect()->back()->with('message', 'Xóa khách hàng thành công!');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy khách hàng.');
            }
        } else {
            // Nếu mật khẩu không đúng
            return redirect()->back()->with('error', 'Mật khẩu không chính xác.');
        }
    }
    else
    {
        abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập.');
    }
}


        public function order($id)
        {
            if (Auth::id() && in_array(Auth::user()->usertype, ['manager', 'admin'])) 
            {
                $customer = user::find($id);

                if ($customer->usertype != 'user') {
                    abort(403, 'Không thể xem đơn hàng của tài khoản quản trị');
                }

                // Lấy lịch sử đơn hàng của khách hàng
                $order = order::where('user_id', $id)->get();

                return view('manager.order', compact('customer', 'order'));
            }
            else
            {
                abort(403, 'Bạn không có quyền truy cập');
            }
        }


        

        public function searchProduct(Request $request)
    {
        $search = $request->search_product;

        $product=product::where('title','LIKE',"%$search%")->get();

        
        
        return view('manager.show_product', compact('product'));
    }


    public function searchService(Request $request)
    {
        $search = $request->search_service;

        $service=service::where('room_title','LIKE',"%$search%")->get();

        
        
        return view('manager.view_service', compact('service'));
    }


    public function searchCustomer(Request $request)
    {
        $search = $request->search_customer;

        $customer=user::where('name','LIKE',"%$search%")->where('usertype','user')->get();

        
        
        return view('manager.customer_list', compact('customer'));
    }




    public function add_acc(Request $request)
        {
            if(Auth::id() && (Auth::User()->usertype == 'manager'))
            {
                $user = new user;
    
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt('12345678'); 
            $user->usertype = $request->usertype; 
    
            $user->save();
    
            return redirect()->back()->with('message', 'Thêm tài khoản quản trị thành công!');
    
    
            }
            else
            {
                abort(403, 'Bạn không có quyền truy cập');
    
            }
        }




        
        public function show_role()
        {
            // Lấy tất cả người dùng với phân quyền là manager và admin
            $user = User::whereIn('usertype', ['manager', 'admin'])->get();
            return view('manager.show_role', compact('user'));
        }


        public function view_acc()
        {
            if(Auth::id() && (Auth::User()->usertype == 'manager'))
            {

            return view('manager.view_acc');
            }

            else
            {
                abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập');
            }

        }




        public function confirm_delete_account(Request $request)
        {
            
            if (Auth::id() && (Auth::user()->usertype == 'manager')) 
            {
                // Lấy mật khẩu của người quản lý từ yêu cầu
                $password = $request->password;

                // Xác minh mật khẩu có chính xác không
                if (Hash::check($password, Auth::user()->password)) {
                    $user = User::find($request->user_id);

                    if ($user) {
                        $user->delete();
                        return redirect()->back()->with('message', 'Xóa tài khoản thành công!');
                    } else {
                        return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
                    }
                } else {
                    // Nếu mật khẩu không đúng
                    return redirect()->back()->with('error', 'Mật khẩu không chính xác.');
                }
            }
            else
            {
                abort(403, 'Chức năng này chỉ dành cho quản lý. Bạn không có quyền truy cập.');
            }
        }




    public function edit_acc($id)
    {
        if (Auth::id() && (Auth::user()->usertype == 'manager')) 
        {
        $user=user::find($id);
        
        return view('manager.edit_acc',compact('user',));
        }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }
    }


    public function update_acc(Request $request, $id)
    {
        if (Auth::id() && (Auth::user()->usertype == 'manager')) 
        {
        $user=user::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->usertype = $request->usertype; 


        
        $user->save();

        return redirect()->back()->with('message','Cập nhật thông tin tài khoản thành công!');
    }
        else
        {
         abort(403, 'Bạn không có quyền truy cập');
        }

    }





}
