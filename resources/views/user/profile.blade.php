@extends('layouts.master')
@section('title')
    User Profile
@endsection

@section('content')
<div class="container">
  <div class="row">
  <div class="col-lg-3">
  <ul class="list-group mt-5">
    <li class="list-group-item"><a href="{{ route('user.change') }}">Change Account Info</a></li>
    <li class="list-group-item"><a href="{{ route('user.changePass') }}">Change Password</a></li>
  </ul>
  </div>
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                @foreach($user as $u)
                <h1 class="h4 text-gray-900 mb-4">User Profile !</h1>
              </div>
              <p class="">Nama : {{ $u->name }}</p>
              <p class="">Email : {{ $u->email }}</p>
              <p class="">Terakhir diupdate : {{ $u->updated_at->format('d/m/Y') }}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection