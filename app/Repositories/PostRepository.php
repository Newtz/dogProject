<?php 



namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Auth;

class PostRepository implements PostRepositoryInterface
{
	
	public function all()
	{
		$posts = Post::with(['images'])->get();

 		return $posts;
	}

	public function findById($postId)
	{
		$post = Post::find($postId);

		return $post;
	}

	public function createPost($request)
	{	
		$post = new Post;

		$post->title 	    = $request->title;
		$post->user_id 	    = Auth::user()->id;
		$post->description  = $request->description;
		$post->local 	    = $request->local;
		$post->latitude     = $request->latitude;
		$post->longitude    = $request->longitude;

		$post->save();

		 return $post;
	}

	public function deletePost($postId)
	{
		$post = Post::find($postId);

		if(!$post) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

		$post->delete();

		return response()->json(['message'=>'Record Deleted'], 200);
	}

	public function updatePost($postId)
	{
		$post = Post::find($postId);

		$post->title 	    = request()->has('title')       ? request()->title       : $post->title;
		$post->description  = request()->has('description') ? request()->description : $post->description;
		$post->local 	    = request()->has('local') 	   ?  request()->local       : $post->local;
		$post->latitude     = request()->has('latitude')   ?  request()->latitude    : $post->latitude;
		$post->longitude    = request()->has('longitude')  ?  request()->longitude   : $post->longitude;

		$post->save();

		return $post;
	}


}