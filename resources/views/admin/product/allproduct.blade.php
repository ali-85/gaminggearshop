@extends('layouts.master')
@section('title')
    All Products
@endsection
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
      <div class="card-body">
        <div class="row">
            <div class="col-lg">
                <a href="{{ route('admin.addproduct') }}" class="btn btn-primary" role="button">Add Products</a>
            </div>
        </div>
        <div class="row mt-2">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}.</th>
                        <td>{{ $p->title }}</td>
                        <td>@rupiah($p->price)</td>
                        <td>
                            <img class="img-thumbnail" src="{{ URL::to('assets/img/' . $p->imagePath) }}" width="156" height="156" alt="Card image cap">
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#editModal{{ $p->id }}" class="btn btn-sm btn-success" role="button"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <a class="btn btn-sm btn-danger" role="button" data-toggle="modal" data-target="#modalConfirmDelete"><i class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="{{ route('product.delProduct',['id' => $p->id]) }}" class="btn btn-outline-danger" role="button">Yes</a>
        <button class="btn btn-danger waves-effect" data-dismiss="modal">No</button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->

@foreach($products as $p)
    <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.update',$p->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                <div class="md-form">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $p->title }}">
                    <label for="title">Title</label>
                </div>
                <div class="md-form">
                    <input type="number" class="form-control" id="price" name="price" value="{{ $p->price }}">
                    <label for="price">Price</label>
                </div>
                <div class="md-form">
                    <textarea type="text" class="md-textarea form-control" id="description" name="description" rows="3">{{ $p->description }}</textarea>
                    <label for="description">Description</label>
                </div>
                <div class="input-group">
                  <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" value="{{ $p->imagePath }}">
                      <label class="custom-file-label">Choose file</label>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                {{ csrf_field() }}
            </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection