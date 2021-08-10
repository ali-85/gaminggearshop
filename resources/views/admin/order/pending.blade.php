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
            <a class="nav-link" href="{{ route('admin.order3') }}">Selesai</a>
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
                                <th scope="col">Cart</th>
                                <th scope="col">Name</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($pending as $p)
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->user_id }}</td>
                                
                                <td>
                                @foreach($p->cart->items as $item)  
                                <b>{{ $item['item']['title'] }}</b>: {{ $item['qty'] }} Unit(s) <br>
                                @endforeach
                                </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->address }}</td>
                                <td><img src="{{ URL::to('/assets/img/'.$p->image) }}" alt="" width="128" height="62"></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicExampleModal{{$p->id}}">Kirim</button>
                                </td>
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
@foreach($pending as $p)
  <div class="modal fade" id="basicExampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan NO Resi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('send',['id' => $p->id]) }}" method="post">
        <div class="md-form mb-5">
            <input type="text" id="resi" name="resi" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-email">Masukkan Resi Pengiriman</label>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
        {{ csrf_field() }}
      </div>
      </form>
      @endforeach
    </div>
  </div>
</div>
@endsection