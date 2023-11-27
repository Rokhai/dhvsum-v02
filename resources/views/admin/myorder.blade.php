@extends(backpack_view('blank'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Order Tracking</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#order-placed">Order Placed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#shipped">Shipped</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#out-for-delivery">Out for Delivery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#delivered">Delivered</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="order-placed" class="tab-pane fade show active">
                    <h5>Order Placed</h5>
                    <p>Order #123456</p>
                    <span class="badge badge-primary">In Progress</span>
                </div>
                <div id="shipped" class="tab-pane fade">
                    <h5>Shipped</h5>
                    <p>Estimated Delivery: 2022-01-01</p>
                    <span class="badge badge-secondary">Pending</span>
                </div>
                <div id="out-for-delivery" class="tab-pane fade">
                    <h5>Out for Delivery</h5>
                    <p>Delivery Address: 123 Main St, City</p>
                    <span class="badge badge-secondary">Pending</span>
                </div>
                <div id="delivered" class="tab-pane fade">
                    <h5>Delivered</h5>
                    <p>Delivered on: 2022-01-02</p>
                    <span class="badge badge-success">Completed</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



