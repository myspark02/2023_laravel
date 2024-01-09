<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 리스트</title>
</head>
<body>
    <div><a href="/posts/create">게시글 작성하기</a></div>
    <h2>게시글 리스트({{$posts->total()}}개)</h2>

    <form action="/posts" method="get">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" name="keyword" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
  </form>
  
    <table>
      <tr>
        <th>연번</th><th>제목</th><th>작성자</th><th>작성일</th>
      </tr>
      @foreach($posts as $post)
      
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at}}</td>
      </tr>
      @endforeach
    </table>
    <div class="flex items-stretch">
      {{$posts->links()}}
    </div>
</body>
</html>