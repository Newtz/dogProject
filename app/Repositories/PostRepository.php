<?php 



namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Http\Models\Post;

class PostRepository implements PostRepositoryInterface
{

	public function all()
	{
 		//return  everything
	}

	public function findById($post)
	{
		//return based on id
	}


}