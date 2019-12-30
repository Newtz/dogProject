<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Http\Requests\PostRequest;
use App\Helpers\GeneralHelper;

class PostController extends Controller
{

    private $postRepository;
    private $requestIndex;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->requestIndex  = 'post_image';
    }

    public function index()
    {
      return $this->postRepository->all();
    } 

    public function store(PostRequest $request)
    {
        GeneralHelper::uploadImage($request, $this->requestIndex);

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
    	return $this->postRepository->updatePost($postId);
    }

    public function destroy($postId)
    {
    	return $this->postRepository->deletePost($postId);
    }
    
  
}

