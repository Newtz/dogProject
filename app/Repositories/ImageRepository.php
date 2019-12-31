<?php 



namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;
use Auth;

class ImageRepository implements ImageRepositoryInterface
{
	
	public function all()
	{
		$images = Image::with(['post'])->get();

 		return $images;
	}

	public function imagesByPost($postId)
	{
		$image = Image::with(['post'])->findOrFail($postId);

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