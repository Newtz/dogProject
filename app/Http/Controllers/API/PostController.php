<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->postRepository->all();
    }
 
    public function store(PostRequest $request)
    {
    	return $this->postRepository->createPost($request);
    }
    
    public function show($postId)
    {
    	return $this->postRepository->findById($postId);
    }
    
    public function edit($postId)
    {
    	return $this->postRepository->findById($postId);
    }

    public function update(PostRequest $request, $postId)
    {
    	
    }

    public function destroy($postId)
    {
    	return $this->postRepository->deletePost($postId);
    }
    
  
}

