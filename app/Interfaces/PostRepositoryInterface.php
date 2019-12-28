<?php 

namespace App\Interfaces;

interface PostRepositoryInterface
{
	
	public function all();

	public function findById($post);

}