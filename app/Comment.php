<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table='comments';
	

	public function getComments($id){
		$getComments = Comment::select('comments.id', 'comments.message', 'comments.userID', 'comments.created_at', 'users.email', 'users.name', 'users.username', 'users.profilePic')
			    ->join('users', 'users.id', '=', 'comments.userID')
			    ->where('comments.postID', $id)
			    ->get();
	    	return $getComments;

	}
}


