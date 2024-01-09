<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 상세보기</title>
  <script type="text/javascript">
    function send_delete(num) {

      return confirm("Are you sure?");

    }
  </script>
</head>
<body>
  <div><a href="/posts">목록보기로 돌아가기</a></div>
  <div>
      제목: {{$post->title}}
  </div>
  <div>
    내용: {{$post->content}}
  </div>
  <div>
    작성자: {{$post->user->name}}
  </div>
  <div>
    생성일: {{$post->created_at}}
  </div>
  <div>
    수정일: {{$post->updated_at}}
  </div>  
  <div>
    <form style="display:inline-block" action="/posts/{{$post->id}}/edit" method="get">
      <input type="submit" value="수정"/>
    </form>
    <form style="display:inline-block" onsubmit="return confirm('Are you sure to delete?')" action="/posts/{{$post->id}}" method="post">
      @csrf
      @method("delete")
      <input type="submit" value="삭제"/>
    </form> 
  </div>
  <div>
    <hr>
    <h4>댓글 등록</h4>
    <form action="/posts/{{$post->id}}/comments" method="post">
        @csrf
        <div>
          <textarea rows="1" cols="30" required name="content"></textarea>
        </div>  
        <input type="submit" value="댓글등록">
    </form>
  </div>
  <div>
    <h2>댓글 리스트({{$post->comments->count()}}개)</h2>
    <table>
      <tr>
        <th>연번</th><th>내용</th><th>작성자</th><th>작성일</th>
      </tr>
      @foreach($post->comments()->orderBy('created_at', 'desc')->get() as $comment)

        <tr>
            <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" 
              method="post">
              <td>{{$loop->index+1}}</td>
              <td><input type="text" value="{{$comment->content}}" name="content"></td>
              <td>{{$comment->user->name}}</td>
              <td>{{$comment->created_at}}</td>
              <td><input type="submit" value="수정"></td>
              @csrf
              @method("put")
            </form>
            <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" 
              method="post">
              <td><input type="submit" onclick="return send_delete()" value="삭제"></td>
              @csrf
              @method("delete")
            </form>

          
        </tr>

      @endforeach
    </table>   
  </div>

</body>
</html>