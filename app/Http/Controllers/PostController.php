<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=new Post();
        $postData=$posts->postData();
        return view('posts')->with(compact('postData'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $postData=array(
        //     'title'=>$request->title,
        //     'description'=>$request->description
        // );
        $this->validate($request,[
            'title' => 'required|string|max:255|unique:posts',
            'description' => 'required|string',
        ]);
        if(Auth::user()){
            $post=new Post();
            $post->title=$request->title;
            $post->description=$request->description;
            $post->userID=Auth::user()->id;
            $post->save();

            return redirect('/posts/create')->with('success', 'Post Created!!');
            
        }
        else{
            return "Unser not loggedin";
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post=new Post();
        $getPost=$post->getPost($id);
        return view('singlePost')->with(compact('getPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function byAuthor($author)
    {
        //
        // echo $author;
        $posts=new Post();
        $postData=$posts->byAuthor($author);
        return view('posts')->with(compact('postData')); 
    }


}
