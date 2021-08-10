@extends('layouts.master')
@section('title')
    Product Detail
@endsection
@section('content')
    <div class="container">
    @foreach($products as $p)
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $p->title }}</li>
    </ol>
    </nav>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="view overlay zoom">
                    <img src="{{ URL::to('assets/img/'.$p->imagePath) }}" alt="Image Product" class="img-thumbnail">
                </div>
            </div>
            <div class="col-lg-5">
                <h4>Deskripsi</h4>
                <p>{{ $p->description }}</p>
            </div>
            <div class="col-lg-3">
                <h4 class="d-flex justify-content-center">
                    @rupiah($p->price)
                </h4>
                <div class="d-flex justify-content-center">
                    <a href="" class="btn btn-outline-primary w-100" data-toggle="modal" data-target="#modalAbandonedCart"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('product.toCheckout',['id' => $p->id]) }}" class="btn btn-primary w-100">Bayar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Button trigger modal-->
<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-primary" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Tambahkan Produk
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
          </div>

          <div class="col-9">
            <p>Masukkan produk kekeranjang belanja?</p>
            <p>Anda bisa Tambahkan produk kekeranjang dan bayar nanti.</p>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a href="{{ route('product.toCheckout',['id' => $p->id]) }}" class="btn btn-primary">Lanjut Bayar</a>
        <a href="{{ route('product.AddtoCart',['id' => $p->id]) }}" class="btn btn-outline-info waves-effect">Tambahkan saja</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->
@endsection