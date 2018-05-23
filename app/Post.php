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

    public function listings($id){
        $result = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.created_at','posts.updated_at', 'users.email', 'users.name', 'users.username', 'posts.userID')
            ->join('users', 'users.id', '=', 'posts.userID')
            ->where('users.id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        return $result;
    }
    public function postDetails($id, $userID){
        $getPost = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.created_at','users.email', 'users.name', 'users.username', 'posts.userID')
            ->join('users', 'users.id', '=', 'posts.userID')
            ->where('posts.id', $id)
            ->where('users.id', $userID)
            ->first();
        return $getPost;
    }
    public function updatePost($data){
        $updatePost=Post::where('id', $data['id'])
            ->where('userID', $data['userID'])
            ->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'updated_at' => now()
            ]);
            return $updatePost;
    }

    public function deletePost($id, $userID){
        $deteleStatus=Post::where('id', $id)
        ->where('userID', $userID)
        ->delete();
        return $deteleStatus;
    }

    
}
