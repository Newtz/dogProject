<?php

namespace App\Interfaces;

interface ImageRepositoryInterface
{
    public function all();

    public function imagesByPost($postId);

    public function saveImagePath($path, $postId);

    public function deleteImage($imageId);

    public function deleteAllImagesByPostId($postId);
}
