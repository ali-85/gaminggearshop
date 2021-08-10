@extends('layouts.master')
@section('title')
    My Order
@endsection

@section('content')
  <div class="container">
    <div class="row">
  <ul class="nav grey lighten-4 py-4">
      <li class="nav-item">
        <a class="nav-link disabled" href="#!">Metode Bayar</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('user.order') }}">Credit Card</a>
      </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.order2') }}">Transfer</a>
        </li>
</ul>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">My Orders !</h1>
              </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @foreach($orders as $order)
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                            <li class="list-group-item">
                                <span class="badge badge-info text-white">@rupiah($item['price'])</span>
                                {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                @if($order->status == 2)
                                <form action="{{ route('cc.finish',['id' => $order->id]) }}" method="post">
                                <button class="btn btn-sm btn-success float-right">Selesai</button>
                                {{ csrf_field() }}
                                </form>
                                @elseif($order->status == 3)
                                <h5>Order Selesai</h5>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    <div class="panel-footer">
                        @if($order->status == "pending")
                        <strong>Status: Menunggu Diproses Admin</strong>
                        @elseif($order->status == 2)
                        @foreach($resic as $rc)
                        <strong>Status: Sedang Dikirim | Resi : <a href="https://cekresi.com/cek-jne-express-logistic.php?noresi={{ $rc->resi }}" target="_blank">{{ $rc->resi }}</a></strong>
                        @endforeach
                        @endif
                    </div>
                  @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection