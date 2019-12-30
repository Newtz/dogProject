<?php 



namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;
use Auth;

class ImageRepository implements ImageRepositoryInterface
{
	
	public function all()
	{
		$images = Image::all();

 		return $images;
	}

	public function imagesByPost($postId)
	{
		$image = Image::where('post_id', $postId)->get();

		return $image;
	}

	public function saveImagePath($request, $postId)
	{
		$image = new Image;

		$image->image_path 		= $request->path;
		$image->post_id 	    = $postId;

		$image->save();

		 return $image;
	}

	public function deleteImage()
	{
		//
	}

}