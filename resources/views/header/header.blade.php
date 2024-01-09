<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  
  <title>@yield('title')</title>
</head>
<body class="vh-100">
  <header class="vw-100 d-flex justify-content-between align-items-center py-2">
    <div class="home">
      <div class="logo"><a href="/" class="text-decoration-none text-light">Personal-blog</a></div>
    </div>
    <div class="account col-2">
      
      @if(request()->path() !== 'signin')
      <button class="btn btn-light"><a href="/signin" class="text-decoration-none text-dark">Sign-in</a></button>
      @endif
      @if(request()->path() !== 'signup')
      <button class="btn btn-light"><a href="/signup" class="text-decoration-none text-dark">Sign-up</a></button>
      @endif
    </div>
  </header>
  @yield('body')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>