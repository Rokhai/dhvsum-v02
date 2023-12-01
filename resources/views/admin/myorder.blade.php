@extends(backpack_view('blank'))

@section('content')
    @php
        // $toShipOrders = DB::table('orders')->where('user_id', backpack_user->id)->where('status', 'To Ship')where('is_delivered', false)->get();
        // $toReceiveOrders = DB::table('orders')->where('user_id', backpack_user->id)->where('status', 'To Receive')->where('is_delivered', false)->get();
        // $deliveredOrders = DB::table('orders')->where('user_id', backpack_user->id)->where('status', 'Delivered')->where('is_delivered', false)->get();

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('carts', 'orders.cart_id', '=', 'carts.id')
            ->where('orders.user_id', backpack_user()->id)
            ->where('orders.is_delivered', false)
            ->where('orders.is_cancelled', false)
            ->select('orders.*', 'products.name', 'products.image', 'carts.quantity')
            ->get();
    @endphp

    <div class="contiainer">
        <div class="card">
            {{-- card head --}}
            <div class="card-header">
                {{-- navs and tabs --}}
                <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-to-ship" class="nav-link active" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-dolly-flatbed fs-1"></i>
                                <span class="d-none d-md-inline">To Ship</span>
                            </span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-to-receive" class="nav-link" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-shipping-fast"></i>
                                <span class="d-none d-md-inline">To Receive</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-delivered" class="nav-link" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-box fs-1"></i>
                                <span class="d-none d-md-inline">Delivered</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- card body --}}
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-to-ship">
                        <div class="col-12">
                            <div class="card" style="height: 45rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        @foreach ($orders as $order)
                                            @if ($order->status == 'To Ship')
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('storage/uploads/products/' . optional($order)->image) }}"
                                                                alt="product image" width="90" height="90">
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>{{ optional($order)->name }}</strong>
                                                            </div>
                                                            <div class="text-secondary">
                                                                {{ optional(\Carbon\Carbon::parse(optional($order)->created_at))->diffForHumans() }}
                                                            </div>
                                                            <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                                <div>Total Amount: &#8369;
                                                                    {{ optional($order)->total_amount }}</div>
                                                                <div>Qty: {{ optional($order)->quantity }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            {{-- <div class="badge bg-primary">To ship</div> --}}
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 mr-4">
                                                            {{-- <a href="#" class="btn btn-outline-primary">Cancel
                                                                Order</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tabs To Receiver --}}
                    <div class="tab-pane" id="tabs-to-receive">
                        <div class="col-12">
                            <div class="card" style="height: 45rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        @foreach ($orders as $order)
                                            @if ($order->status == 'To Receive')
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('storage/uploads/products/' . optional($order)->image) }}"
                                                                alt="product image" width="90" height="90">
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>{{ optional($order)->name }}</strong>
                                                            </div>
                                                            <div class="text-secondary">
                                                                {{ optional(\Carbon\Carbon::parse(optional($order)->created_at))->diffForHumans() }}
                                                            </div>
                                                            <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                                <div>Total Amount:
                                                                    &#8369;{{ optional($order)->total_amount }}</div>
                                                                <div>Qty: {{ optional($order)->quantity }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            {{-- <div class="badge bg-primary">To ship</div> --}}
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 mr-4">

                                                            {{-- <button type="button" class="btn btn-outline-primary"
                                                                disabled>Cancel Order</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tabs Delivered --}}
                    <div class="tab-pane" id="tabs-delivered">
                        <div class="col-12">
                            <div class="card" style="height: 45rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        @foreach ($orders as $order)
                                            @if ($order->status == 'Delivered')
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('storage/uploads/products/' . optional($order)->image) }}"
                                                                alt="product image" width="90" height="90">
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>{{ optional($order)->name }}</strong>
                                                            </div>
                                                            <div class="text-secondary">
                                                                {{ optional(\Carbon\Carbon::parse(optional($order)->created_at))->diffForHumans() }}
                                                            </div>
                                                            <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                                <div>Total Amount: &#8369;
                                                                    {{ optional($order)->total_amount }}</div>
                                                                <div>Qty: {{ optional($order)->quantity }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-row   justify-content-end  mt-3 ">
                                                            <!-- Button trigger modal -->
                                                            {{-- <button type="button" class="btn btn-outline-warning mx-1 "
                                                                data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                                                Leave Feedback
                                                            </button> --}}
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="feedbackModal({{ optional($order)->product_id }}, {{optional($order)->id}})">
                                                                Order Received
                                                            </button>
                                                            {{-- <a href="#" class="btn btn-primary ">Order Received</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Modal -->
    @php

        $ratings = DB::table('ratings')->get();
    @endphp
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="formFeedback">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Leave Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-label">Rate It With Stars</div>
                            <select class="form-select" name="rating_id">
                                @foreach ($ratings as $rating)
                                    <option value="{{ $rating->id }}">
                                        {{ $rating->name }} {{ $rating->rating }}
                                    </option>
                                @endforeach
                                {{-- <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="feedbackText" class="form-label">Your Feedback</label>
                            <textarea class="form-control" id="feedbackText" rows="3" data-bs-toggle="autosize"
                                placeholder="Type your comment...." name="comment"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <input type="hidden" id="order_id" name="order_id" value="">
                        {{-- <a href="" class="btn btn-secondary" id="dntsbmt">Don't Submit Feedback</a> --}}
                        <button type="submit" class="btn btn-secondary"  onclick="received()">Don't Submit a Feedback</button>
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Don't Submit a Feedback</button> --}}
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function received() {
            var productIdInput = document.getElementById('product_id');
            var form = document.getElementById('formFeedback');
            form.action = "{{ backpack_url('myorder') }}" + "/" + productIdInput.value + "/received";
            // form.method = "PUT";
        }

        function feedbackModal(productId, orderId) {

            // document.querySelector('input[name="product_id"]').value = productId;
            var productIdInput = document.getElementById('product_id');
            productIdInput.value = productId;

            var orderIdInput = document.getElementById('order_id');
            orderIdInput.value = orderId;
            
            // var dontsubmit = document.getElementById('dntsbmt');
            // dontsubmit.href = "{{ backpack_url('myorder') }}" + "/" + productId + "/received";

            var form = document.getElementById('formFeedback');
            form.action = "{{ backpack_url('myorder/update') }}";

            var myModal = new bootstrap.Modal(document.getElementById('feedbackModal'), {});
            myModal.show()
        }
    </script>
@endsection
