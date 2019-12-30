<?php 

namespace App\Helpers;

class GeneralHelper
{

	public static function uploadImage($request, $index)
	{
		$image 	   = $request->file($index);
		$request->request->add(['image_name' => $image->store('post_images', 'public') ]);
	}
}
