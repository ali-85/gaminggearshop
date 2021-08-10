@extends('layouts.master')
@section('title')
    User Profile
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                @if(Session::has('danger'))
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                @endif
                <h1 class="h4 text-gray-900 mb-4">Change Account Info !</h1>
              </div>
              @foreach($user as $u)
              <form class="md-form" action="{{ route('user.update',['id' => $u->id]) }}" method="post">
                    <div class="md-form mb-4">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $u->name }}">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $u->email }}">
                        <label for="email">Email</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="password" class="form-control">
                        <label for="password">Password</label>
                    </div>
                    <div class="md-form">
                        <button type="submit" class="btn btn-outline-info btn-block mx-auto">Change</button>
                        {{ csrf_field() }}
                    </div>
              </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection