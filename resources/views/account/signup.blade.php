@extends('header.header')

@section('title', 'blog')



@section('body')
<main class="d-flex justify-content-center align-items-center" style="height: 90vh">
  <form class="card p-5 bg-light-subtle col-6" method="post" action="/processaCadastro">
    @csrf
    <div class="mb-3">
      <label for="inputName" class="form-label">Name:</label>
      <input type="text" name="name" class="form-control" id="inputName">
    </div>
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email address:</label>
      <input type="email" name="email" class="form-control" id="inputEmail">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password:</label>
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <div class="mb-3">
      <label for="inputPasswordConfirm" class="form-label">Password Confirm:</label>
      <input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConfirm">
    </div>
    <button type="submit" class="btn btn-primary">Create account</button>
    @if($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif
  </form>

</main>
@stop