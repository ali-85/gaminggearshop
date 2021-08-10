@extends('layouts.master')
@section('title')
    Forgot Password
@endsection

@section('content')
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Forgot your Password?</h1>
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
              </div>
              <form class="user" method="post" action="{{ route('user.signin') }}">
                <div class="md-form">
                  <input type="text" class="form-control" id="email" name="email">
                  <label for="email">Email</label>
                    @error('email')
                      <div class="alert alert-danger alert-dismissible fade show">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                <button type="submit" class="btn btn-primary btn-user btn-block mt-3 mx-auto">
                  Send <i class="fas fa-paper-plane"></i>
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