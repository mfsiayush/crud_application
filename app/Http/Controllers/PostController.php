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
        $this->validateFields($request);
        
        if(Auth::user()){
            $post=new Post();
            $post->title=$request->title;
            $post->description=$request->description;
            $post->userID=Auth::user()->id;
            $post->save();

            return redirect('/posts/create')->with('success', 'Post Created!!');
            
        }
        else{
            return "User not loggedin";
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

        $posts=new Post();
        $respData=$posts->postDetails($id, Auth::user()->id);

        return view('edit')->with(compact('respData'));
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
        $this->validateFields($request);
        $data=array(
            'id'=>$id,
            'title'=>$request->title,
            'description'=>$request->description,
            'userID'=>Auth::user()->id
        );
        $posts=new Post();
        $respData=$posts->updatePost($data);
        if($respData){
            $respMsg='Post Updated!!!';
        }
        else{
            $respMsg='Unable to update post!!!';
        }
        return redirect()->route('edit', ['id' => $id])->with('response', $respMsg);
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
        $posts=new Post();
        $deteleStatus=$posts->deletePost($id, Auth::user()->id);
        if($deteleStatus){
            $respMsg='Post Deleted!!!';
        }
        else{
            $respMsg='Unable to delete post!!!';
        }
        return redirect()->route('listings')->with('response', $respMsg);
    }

    public function byAuthor($author)
    {
        //
        $posts=new Post();
        $postData=$posts->byAuthor($author);
        return view('posts')->with(compact('postData')); 
    }

    public function listings()
    {
        if(Auth::user()){
            $posts=new Post();
            $getListing=$posts->listings(Auth::user()->id);
            return view('listings')->with(compact('getListing'));
        }
        else{
            echo "please login";
        }
    }

    public function validateFields(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:255|unique:posts',
            'description' => 'required|string',
        ]);
    }




}
