<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <form action="/posts" method="post">
      @csrf
      <label>제목:<input type="text" name="title"> </label> <br>
      <label>내용:<textarea name="content" rows="5"></textarea> </label> <br>
      <input type="submit" value="등록">
    </form>
</body>
</html>