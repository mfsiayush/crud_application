<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table='posts';


    public function postData(){
    	$result = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.created_at','users.email', 'users.name', 'users.username', 'posts.userID')
		    ->join('users', 'users.id', '=', 'posts.userID')
		    ->orderBy('created_at', 'desc')
		    ->get();
    	return $result;
    }

    public function getPost($id){
    	$getPost = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.created_at','users.email', 'users.name', 'users.username', 'posts.userID')
		    ->join('users', 'users.id', '=', 'posts.userID')
		    ->where('posts.id', $id)
		    ->get();
    	return $getPost;
    }

    public function byAuthor($author){
    	$result = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.created_at','users.email', 'users.name', 'users.username', 'posts.userID')
		    ->join('users', 'users.id', '=', 'posts.userID')
		    ->where('users.username', $author)
		    ->orderBy('created_at', 'desc')
		    ->get();
    	return $result;
    }

    
}
