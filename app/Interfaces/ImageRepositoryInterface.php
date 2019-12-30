<?php 

namespace App\Interfaces;

interface ImageRepositoryInterface
{
	
	public function all();

	public function imagesByPost($postId);

	public function saveImagePath($request, $postId);

	public function deleteImage();

}