<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <form action="/users" method="post">
      @csrf
      <label>이름:<input type="text" name="name"> </label> <br>
      <label>생년월일(YYYY/MM/DD):<input type="text" name="birthDate"> </label> <br>
      <label>이메일:<input type="email" name="email"> </label> <br>
      <label>소속:<input type="text" name="org"> </label> <br>
      <input type="submit" value="등록">
    </form>
</body>
</html>