<?php

namespace App\Helpers;

class GeneralHelper
{

	public static function uploadImage($request, $index)
	{
        $count         = 0;
        $images 	   = $request->file($index);

        foreach($images as $image)
        {
            $request->request->add(['path_'.$count => $image->store('post_images', 'public') ]);
            $count++;
        }
        return $count;
	}
}
