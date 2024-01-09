<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="/users/{{$user['id']}}">
    이름 : <input type="text" name="name" value='{{$user["name"]}}'> <br>
    생년월일 : <input type="text" name="birthDate" 
                            value= '{{$user["birthDate"]}}'> <br>
    이메일 : <input type="email" name="email" 
                          value='{{$user["email"]}}'> <br><br>
    @csrf
    @method('put')
    <input type="submit" value="수정">
  </form>
</body>
</html>