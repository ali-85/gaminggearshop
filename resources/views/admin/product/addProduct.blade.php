@extends('layouts.master')
@section('title')
    Add New Product
@endsection
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <form class="product" method="post" action="{{ route('admin.storeproduct') }}" enctype="multipart/form-data">
                                <div class="md-form">
                                    <input type="text" class="form-control" id="title" name="title">
                                    <label for="title">Title</label>
                                </div>
                                <div class="md-form">
                                    <input type="number" class="form-control" id="price" name="price">
                                    <label for="price">Price</label>
                                </div>
                                <div class="md-form">
                                    <textarea class="md-textarea form-control" id="description" name="description" rows="3"></textarea>
                                    <label for="description">Description</label>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="md-form mt-3">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Add New Product
                                    </button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection