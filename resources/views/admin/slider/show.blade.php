@extends('layouts.master')
@section('title')
    All Sliders
@endsection
@section('content')
    <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
      <div class="card-body">
        <div class="row">
            @if($count < 3)
            <div class="col-lg">
                <a href="{{ route('admin.addslider') }}" class="btn btn-primary" role="button">Add Slider</a>
            </div>
            @endif
        </div>
        <div class="row mt-2">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Link | Anchor link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slider as $s)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $s->title }}</td>
                        <td>
                        <img class="img-thumbnail" src="{{ URL::to('assets/img/carousel/' . $s->image) }}" width="200" height="130" alt="Card image cap">
                        </td>
                        <td>{{ $s->link }}</td>
                        <td>
                            <a data-toggle="modal" data-target="#editModal{{$s->id}}" class="btn btn-sm btn-success" role="button"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <a class="btn btn-sm btn-danger" role="button" data-toggle="modal" data-target="#modalConfirmDelete"><i class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                <a href="{{ route('admin.deleteSlider',['id' => $s->id]) }}" class="btn btn-outline-danger" role="button">Yes</a>
                <button class="btn btn-danger waves-effect" data-dismiss="modal">No</button>
            </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->
    
    @foreach($slider as $s)
    <div class="modal fade" id="editModal{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.updateSlider',$s->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                    <div class="md-form">
                        <input type="text" class="form-control" id="title" name="title" value="{{$s->title}}">
                        <label for="title">Title</label>
                    </div>
                    <div class="md-form">
                        <input type="text" class="form-control" id="link" name="link" value="{{ $s->link }}">
                        <label for="link">Link | Anchor link</label>
                    </div>
                    <div class="input">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" value="{{ $s->image }}">
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

    </div>
@endsection