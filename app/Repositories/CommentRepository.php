<?php



namespace App\Repositories;

use App\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentRepository implements CommentInterface
{
    public function findById($commentId)
    {
        $comment = Comment::with(['post'])->findOrFail($commentId);

        return $comment;
    }


    public function saveComment($request)
    {
        $comment = Comment::create([
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
        ]);

        return $comment;
    }

    public function updateComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->comment = request()->new_comment ?? $comment->comment;

        return $comment;
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->delete();

        return response()->json(['message'=>'Record Deleted'], 200);
    }

    public function deleteAllCommentsByPost($postId)
    {
        $post = Post::findOrFail($postId);

        $post->comments()->forceDelete();

        return response()->json(['message'=>'All records were deleted'], 200);
    }
}
