<?php 

namespace App\Helpers;

class GeneralHelper
{

	public static function uploadImage($request)
	{
		$image 	   = $request->file('post_image');
		$request->request->add(['image_name' => $image->store('post_images', 'public') ]);
	}
}
