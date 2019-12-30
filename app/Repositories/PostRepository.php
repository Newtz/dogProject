<?php 



namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Auth;

class PostRepository implements PostRepositoryInterface
{
	
	public function all()
	{
		$posts = Post::all();

 		return response()->json($posts, 200);
	}

	public function findById($postId)
	{
		$post = Post::find($postId);

		return response()->json($post, 200);
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
		$post->image_name   = $request->image_name;

		$post->save();

		 return response()->json($post, 201);
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

		$post->title 	   = request()->title;
		$post->description = request()->description;
		$post->save();

		return response()->json($post, 201);
	}


}