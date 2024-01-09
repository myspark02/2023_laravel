<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        // 리스트를 보여주는 기능을 수행
        // DB의 posts 테이블의 레코드들을 읽어온다. 
        // $posts = Post::all();  // posts 테이블의 모든 레코드들을 읽어온다. 
        
        // Post 객체의 collection 이라는 집합 자료형으로 반환해준다. 
        // select * from posts; 

       // $posts = Post::orderBy('created_at', 'desc')->get();
       //$posts = Post::orderByDesc('created_at')->get();

        $keyword = $req->keyword;
        if (isset($keyword)) {
            $posts = Post::where('content', 'like', '%'.$keyword.'%')
                                ->orWhere('title', 'like', '%'.$keyword.'%')
                                ->paginate(5)->withQueryString();
        }
        else $posts = Post::paginate(5);  // 한 페이지에 5개 레코드씩 표시
    //    $posts = Post::simplePaginate(5); 
    //    dd($posts) ;
    //    dd($posts->total());

    //    $count = Post::count();

        // $count = $posts->count();
       
        // 그렇게 읽어온 레코드들을 뷰페이지 전달한다. 
        // return view('posts.post_list', ['posts'=>$posts, 'count'=>$count]);
        return view('posts.post_list', ['posts'=>$posts]);
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;

        // $post = new Post;
        // $post->title = $title;
        // $post->content = $content;
        // $post->user_id = 2; // 사용자 로그인 기능 추가될 때까지는 하드코딩
        // $post->save();


        // dd($request->all());
        // Post::create(['title'=>$title, 'content'=>$content, 'user_id'=>2]);

        $request->merge(['user_id'=>2]);

        // dd($request->all());

        Post::create($request->all());

        return redirect('/posts');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // DB의 posts 테이블에서 id 칼럼값으로 $id 값을 가지는 레코드를 읽어온다.
        // 읽어온 그 레코드를 블레이드 뷰 파일에 전달한다. 
        
        // $post = Post::find($id); // select * from posts where id = $id;
        
        $post = Post::findOrFail($id);

        // $post = Post::where('id', $id)->first(); 

        // $post = Post::firstWhere('id', $id);

        // dd($post); // die & dump, 디버깅 함수
        //  dd($post->title);
        // Post::where('id', '>', $id); // select * from posts where id > $id;
        // select * from posts where id > $id and name = '홍길동';
        // Post::where('id', '>', $id)->where('name', '홍길동')->get();

        // select * from posts where id > $id or name ='홍길동';
        // Post::where('id', '>', $id)->orWhere('name', '홍길동')->get();
        return view('posts.show_post', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DB posts 테이블에서 id 칼럼의 값이 $id인 레코드를 인출
        $post = Post::find($id); // select * from posts where id = $id

        // 그 레코드를 편집 폼 페이지를 생성하는 블레이드에게 전달
        return view('posts.edit_post', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //DB posts 테이블에서 id 칼럼의 값이 $id인 레코드를 찾아서
        // 사용자가 입력한 title, content로 변경해준다. 
        // update posts set title=?, content=? where id = ?
        // $post = Post::find($id); // select * from posts where id = ?
        // $post->title = $request->title;
        // $post->content = $request->content; // $request->input("content")

        // $post->save();
        // update posts set title=?, content=? where id = ?

        // Post::where('id', $id)->update(['title'=>$request->title, 'content'=>$request->content]);
        // update는 모델 클래스의 화이트 리스트와 블랙 리스트를 참조하지 않는다!!!!
        // 연관 배열에 있는 모든 키를 변경할 칼럼이름으로 간주하고 update 문을 생성해 실행한다. 
        Post::where('id', $id)->update(['title'=>$request->title, 'content'=>$request->content]);
        // update posts set title=?, content=? where id = ?
        // 상세보기 페이지로 리다이렉트 한다.

        return redirect('/posts/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB posts 테이블에서 id 칼럼 값이 $id인 레코드를 삭제한다. 
        Post::destroy($id); // delete from posts where id = ?

        // posts 리스트 보기 뷰로 리다이렉트
        return redirect('/posts');
    }
}
