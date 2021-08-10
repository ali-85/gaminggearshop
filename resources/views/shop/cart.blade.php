@extends('layouts.master')
@section('title')
    Shopping Cart
@endsection
@section('content')
    @if(Session::has('cart'))
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <ul class="list-group">
                                    @foreach($products as $p)
                                        <li class="list-group-item">
                                            <span class="badge badge-default">{{ $p['qty'] }}</span>
                                            <strong>{{ $p['item']['title'] }}</strong>
                                            <span class="badge badge-success">@rupiah($p['price'])</span>
                                            <a href="{{ route('product.remove',['id' => $p['item']['id']]) }}" class="badge badge-danger float-right ml-2" role="button"><i class="fas fa-trash"></i></a>
                                            <a href="{{ route('product.reduce',['id' => $p['item']['id']]) }}" class="badge badge-secondary float-right" role="button"><i class="fas fa-minus"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <strong>Total: @rupiah($totalPrice)</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ route('checkout') }}" class="btn btn-success" role="button">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h4>No item in Shopping Cart !</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($get as $p)
            <div class="col-md-6 col-lg-4 mt-2">
                <div class="card" style="width: 18rem;">
                <div class="view overlay">
                    <img class="img-thumbnail" src="{{ URL::to('assets/img/'.$p->imagePath) }}" alt="Card image cap">
                    <a href="{{ route('product.detail',['id' => $p->id]) }}">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                    <div class="card-body">
                        <a href="{{ route('product.detail',['id' => $p->id]) }}" name="$p->title">
                            <h5 class="card-title font-weight-bold">{{ $p->title }}</h5>
                        </a>
                        <p><h6 class="text-gray font-weight-bold float-left mt-2">@rupiah($p->price)</h6>
                        <a href="{{ route('product.AddtoCart',['id' => $p->id]) }}" class="btn btn-primary btn-sm float-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection