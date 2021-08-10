@extends('layouts.master')
@section('title')
    Change Password
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
                                    </div>
                                    </div>
                                </div>
                            @endif
                        <h1 class="h4 text-gray-900 mb-4">Change Password !</h1>
                    </div>
              <form class="md-form" action="{{ route('user.updatePass') }}" method="post">
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="oldPass" id="oldPass" class="form-control">
                        <label for="oldPass">Current Password</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="password" class="form-control">
                        <label for="password">New Password</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="password1" id="password1" class="form-control">
                        <label for="password1">Confirm New Password</label>
                    </div>
                    <div class="md-form">
                        <button type="submit" class="btn btn-outline-info btn-block mx-auto">Change</button>
                    </div>
                    {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection