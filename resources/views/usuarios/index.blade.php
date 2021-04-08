<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action name="login" id="login"  action="{{url('user.login')}}">
  @csrf
    <label for="email">
      Email
      <input type="text" name="email"/>
    </label>
    <label for="password">
      Senha
      <input type="text" name="password"/>
    </label>
    <button type="submit">Login</button>
  </form>
</body>
</html>