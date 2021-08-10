@extends('layouts.master')
@section('title')
    GamingGear
@endsection
@section('styles')
    <style>
        @media only screen and (max-width: 576px) {
            .d-block{
                height: 200px;
            }
        }
        .d-block{
            max-height: 400px;
        }
    </style>
@endsection
@section('content')
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
                @foreach($slider as $s)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($slider as $s)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <a href="{{ $s->link }}">
                    <img class="d-block w-100" src="{{ URL::to('assets/img/carousel/'.$s->image) }}" alt="{{ $s->title }}">
                    </a>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
        @if(Session::has('success'))
        <div class="row mt-3">
            <div class="col-lg-12">
                <div id="purchase-message" class="alert alert-success text-center" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('status'))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ Session::get('status') }}</li>
            </ol>
        </nav>
        @endif
        <div class="row mt-3">
            @foreach($products as $p)
            <div class="col-md-6 col-lg-4 mt-2">
                <div class="card" style="width: 18rem;">
                <div class="view overlay">
                    <img class="img-thumbnail" src="{{ URL::to('assets/img/'.$p->imagePath) }}" alt="Card image cap" width="800" height="800">
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
@endsection