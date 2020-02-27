<?php



namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;
use App\Models\Post;
use Auth;
use Storage;

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

        $this->deleteFilesByPost($image->post_id);

        if (!$image) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $image->delete();

        return response()->json(['message'=>'Record Deleted'], 200);
    }

    public function deleteAllImagesByPostId($postId)
    {
        $this->deleteFilesByPost($postId);
        $post = Post::findOrFail($postId);

        $post->images()->forceDelete();
    }
    
    private function deleteFilesByPost($postId)
    {
        $images = Image::where('post_id', $postId)->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
    }
}
