@extends('header.header')

@section('title', 'blog')



@section('body')
<main class="d-flex justify-content-center align-items-center" style="height: 90vh">
  <form class="card p-5 bg-light-subtle">
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

</main>
@stop