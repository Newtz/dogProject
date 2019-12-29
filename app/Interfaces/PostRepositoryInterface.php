<?php 

namespace App\Interfaces;

interface PostRepositoryInterface
{
	
	public function all();

	public function findById($postId);

	public function createPost($request);

	public function deletePost($postId);

	public function updatePost($postId);

}