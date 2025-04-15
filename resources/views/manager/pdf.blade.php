
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Thông tin Đơn hàng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            font-size: 35px;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        h3 {
            font-size: 15px;
            font-family: DejaVu Sans, sans-serif;
            font-weight: normal;
            margin: 5px 0;
        }

        .section-title {
            font-weight: bold;
        }

        .customer-info, .product-info {
            margin-bottom: 30px;
        }

        .img_dev {
            text-align: center;
            margin-bottom: 40px;
        }

        .img_dev img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .product-table th, .product-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .product-image {
            text-align: center;
        }

        .total-amount {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }

        .total-quantity {
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <!-- Logo của cửa hàng -->
    <div class="img_dev">
        <img width="250" src="{{ public_path('/images/logo.png') }}" alt="Logo" />
    </div>

    <h1>Thông tin Đơn hàng</h1>

    <!-- Thông tin khách hàng -->
    <div class="customer-info">
        <h3>Tên khách hàng: {{ $orders->first()->name }}</h3>

        
        <h3>Email: {{ $orders->first()->email }}</h3>

        <h3>Số điện thoại: {{ $orders->first()->phonenumber }}</h3>

        
        <h3>Địa chỉ: {{ $orders->first()->address }}</h3>

        <h3>Phương thức thanh toán: {{ $orders->first()->payment_status }}</h3>

        <h3>Trạng thái giao hàng: {{ $orders->first()->delivery_status }}</h3>

    </div>

    <!-- Bảng thông tin sản phẩm -->
    <table class="product-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Thành tiền</th>
                
            </tr>
        </thead>
        <tbody>

            @php
            $totalAmount = 0;
            $totalQuantity = 0;
            @endphp

            @foreach($orders as $order)
                @php
                    $itemTotal = $order->quantity * $order->price;
                    $totalAmount += $itemTotal;
                    $totalQuantity += $order->quantity;
                @endphp
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td class="product-image">
                        <img height="100px" width="100px" src="{{ public_path('/product/' . $order->image) }}" alt="Hình ảnh sản phẩm" />
                    </td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($itemTotal, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tổng cộng -->
    <div class="total-quantity">
        Tổng số lượng sản phẩm: {{ $totalQuantity }}
    </div>

    <div class="total-amount">
        Tổng giá trị đơn hàng: {{ number_format($totalAmount, 0, ',', '.') }} VNĐ
    </div>

</body>
</html>
