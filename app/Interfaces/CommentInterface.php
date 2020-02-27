<?php

namespace App\Interfaces;

interface CommentInterface
{
    public function findById($commentId);

    public function saveComment($request);

    public function updateComment($request);

    public function deleteComment($commentId);

    public function deleteAllCommentsByPost($postId);
}
