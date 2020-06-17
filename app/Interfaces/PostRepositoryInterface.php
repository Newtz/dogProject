<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function all();

    public function commentsByPost($postId);

    public function findById($postId);

    public function createPost($request);

    public function deletePost($postId);

    public function updatePost($postId);

    public function like($postId);

    public function dislike($postId);

    public function authUserPosts();
}
