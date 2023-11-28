@extends(backpack_view('blank'))

@section('content')
    <div class="card">
        <div class="img-container bg bg-ligt h-25 w-100 align-items-center d-flex justify-content-center">

            <img src="{{asset('/storage/uploads/products/' . $product->image)}}" alt="" class="img-top  img-fluid" >
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Price: ${{ $product->price }}</p>
        </div>
    </div>



@endsection

