@extends('layouts.app')
<style type="text/css">
  .profile-img{
    max-width: 150px;
    border:5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
</style>
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel panel-body text-center">
    <img class=" profile-img" src="/img/avatar.png" alt="">
    <h1>{{$user->name}}</h1>
    <h5>{{$user->email}}</h5>
    <h5>{{$user->dob->format('l j F Y')}}&nbsp({{$user->dob->age}} years old)</h5>
    <button type="button" class="btn btn-success" name="button"> Follow</button>
  </div>

</div>


  </div>

</div>


@endsection
