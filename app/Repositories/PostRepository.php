<?php



namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CommentInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Models\Post;
use App\Models\LikeDislike;
use Auth;

class PostRepository implements PostRepositoryInterface
{
    private $imageRepository;
    private $commentRepository;

    public function __construct(ImageRepositoryInterface $imageRepository, CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository ;
        $this->imageRepository =  $imageRepository;
    }

    public function all()
    {
        $posts = Post::with(['images'])->get();

        return $posts;
    }

    public function commentsByPost($postId)
    {
        $post = Post::find($postId);

        return $post->comments()->get();
    }

    public function findById($postId)
    {
        $post = Post::with(['images'])->findOrFail($postId);

        return $post;
    }

    public function createPost($request)
    {
        $post = new Post;

        $post->title 	    = $request->title;
        $post->user_id 	    = Auth::user()->id;
        $post->description  = $request->description;
        $post->latitude     = $request->latitude;
        $post->longitude    = $request->longitude;

        $post->save();

        return $post;
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $this->commentRepository->deleteAllCommentsByPost($postId);
        $this->imageRepository->deleteAllImagesByPostId($postId);
        $post->delete();

        return response()->json(['message'=>'Record Deleted'], 200);
    }

    public function updatePost($postId)
    {
        $post = Post::find($postId);

        $post->title 	    = request()->title 	     ??   $post->title;
        $post->description  = request()->description ??   $post->description;
        $post->latitude     = request()->latitude    ??   $post->latitude;
        $post->longitude    = request()->longitude   ??   $post->longitude;

        $post->save();

        return $post;
    }

    public function like($postId)
    {
        $post = LikeDislike::updateOrCreate(
            ['user_id'=> Auth::user()->id, 'post_id' => $postId],
            ['likeDisklike'=> 1]
        );

        return $post;
    }

    public function dislike($postId)
    {
        $post = LikeDislike::updateOrCreate(
            ['user_id'=> Auth::user()->id, 'post_id' => $postId],
            ['likeDisklike'=> 0]
        );

        return $post;
    }

    public function authUserPosts()
    {
        $posts = Post::with(['images'])->where('user_id', Auth::user()->id)->get();
        return $posts;
    }
}
