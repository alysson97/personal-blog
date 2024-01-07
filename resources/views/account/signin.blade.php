@extends('header.header')

@section('title', 'blog')



@section('body')
<main class="d-flex justify-content-center align-items-center" style="height: 90vh">
  <form class="card p-5 bg-light-subtle"  method="post" action="/verificaLogin">
    @csrf
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    @if(session('error'))
      <label for="password">Usuário ou senha inválidos</label>
    @endif
  </form>

</main>
@stop