<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\CommentInterface;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRepository;
    private $postRepository;

    public function __construct(CommentInterface $commentRepository, PostRepositoryInterface $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function index($postId)
    {
        $postWithComments  =  $this->postRepository->commentsByPost($postId);

        return response()->json(['data'=>$postWithComments], 200);
    }

    public function store(Request $request)
    {
        $comment =  $this->commentRepository->saveComment($request);

    	return response()->json($comment->with(['post'])->findOrFail($comment->id), 201);
    }

    public function show($commentId)
    {
        return response()->json($this->commentRepository->findById($commentId), 200);
    }

    public function update($commentId)
    {
        return response()->json($this->commentRepository->updateComment($commentId), 200);
    }

    public function destroy($commentId)
    {
        return $this->commentRepository->deleteComment($commentId);
    }

    public function destroyAll($postId)
    {
        return $this->commentRepository->deleteAllCommentsByPost($postId);
    }
}
