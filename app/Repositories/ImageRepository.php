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
        $image = Image::with(['post'])->where('post_id', $postId)->get();

		return $image;
	}


	public function saveImagePath($path, $postId)
	{
		$image = new Image;

		$image->image_path 		= $path;
		$image->post_id 	    = $postId;

		$image->save();

		 return $image;
	}

	public function deleteImage($imageId)
	{
		$image = Image::find($imageId);

		if(!$image) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

		$image->delete();

		return response()->json(['message'=>'Record Deleted'], 200);
	}

}
