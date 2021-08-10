@extends('layouts.master')
@section('title')
    Pending Order
@endsection
@section('content')
<div class="container">
  <div class="row">
  <ul class="nav grey lighten-4 py-4">
      <li class="nav-item">
        <a class="nav-link disabled" href="#!">Transfer</a>
      </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.order') }}">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.order2') }}">Dikirim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.order2') }}">Selesai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#!">Credit Card</a>
      </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('credit.order') }}">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('credit.order2') }}">Dikirim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('credit.order3') }}">Selesai</a>
      </li>
</ul>
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-12">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                    <div class="p-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Cart</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status</th>
                                <th scope="col">Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($pending as $p)
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->user_id }}</td>
                                <td>{{ $p->name }}</td>
                                @foreach($p->cart->items as $item)
                                <td>{{ $item['item']['title'] }} | {{ $item['qty'] }} Units</td>
                                @endforeach
                                <td>{{ $p->address }}</td>
                                <td>@if($p->status == 3)
                                    Selesai
                                    @endif</td>
                                @foreach($resi as $r)
                                <td>
                                    <a href="https://cekresi.com/cek-jne-express-logistic.php?noresi={{ $r->resi }}" target="_blank">{{ $r->resi }}</a>
                                </td>
                                @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection