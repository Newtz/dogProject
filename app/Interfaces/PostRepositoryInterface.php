<?php 

namespace App\Interfaces\PostRepositoryInterface;

interface PostRepositoryInterface 
{
	
	public function all();

	public function findById($post);

}