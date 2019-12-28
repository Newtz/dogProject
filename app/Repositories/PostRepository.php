<?php 



namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{

	public function all()
	{
 		return Post::all();
	}

	public function findById($post)
	{
		//return based on id
	}


}