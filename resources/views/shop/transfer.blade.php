@extends('layouts.master')
@section('title')
    Transfer Method
@endsection
@section('content')
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <a href="{{ route('checkout') }}"><i class="fas fa-arrow-left"></i> Credit Card</a>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Checkout!</h1>
                <h5 class="h5 text-gray-900">Your Total : @rupiah($total)</h5>
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}" role="alert">{{ Session::get('error') }}</div>
              </div>
              <form action="{{ route('transfer.postcheckout') }}" method="post" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
                </div>
                <p> Transfer to : 4444-4444-4444</p>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"
                        aria-describedby="inputGroupFileAddon01" name="image">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Bukti Transfer</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block mx-auto">
                  Transfer
                </button>
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection