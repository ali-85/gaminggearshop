@extends('layouts.master')
@section('title')
    Credit Card Methode
@endsection
@section('style')
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<CLIENT-KEY>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <a href="{{ route('transfer.checkout') }}"><i class="fas fa-arrow-right"></i> Bank Transfer</a>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Checkout!</h1>
                <h5 class="h5 text-gray-900">Your Total : @rupiah($total)</h5>
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}" role="alert">{{ Session::get('error') }}</div>
              </div>
              <form action="{{ route('storecheckout') }}" method="post" id="checkout-form" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="card-name" name="card-name" placeholder="Card Holder Name">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="card-number" name="card-number" placeholder="Credit Card Number">
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <input type="number" class="form-control form-control-user" id="card-expiry-month" name="card-expiry-month" placeholder="Expire Month">
                  </div>
                  <div class="col">
                    <input type="number" class="form-control form-control-user" id="card-expiry-year" name="card-expiry-year" placeholder="Expire Year">
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="card-cvc" name="card-cvc" placeholder="CVC">
                </div>
                <button id="submit" class="btn btn-success btn-block mx-auto">
                  Checkout
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
  @section('script')
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{ URL::to('/js/checkout.js') }}"></script>
  @endsection