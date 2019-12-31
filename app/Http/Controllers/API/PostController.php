<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Http\Requests\PostRequest;
use App\Helpers\GeneralHelper;
use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{

    private $postRepository;
    private $imageRepository;
    private $requestIndex;

    public function __construct(PostRepositoryInterface $postRepository, ImageRepositoryInterface $imageRepository)
    {
        $this->postRepository = $postRepository;
        $this->imageRepository = $imageRepository;
        $this->requestIndex  = 'image_path';
    }

    public function index()
    {
        return response()->json($this->postRepository->all(), 200);
    } 

    public function store(PostRequest $request)
    {
        GeneralHelper::uploadImage($request, $this->requestIndex);
        $post          =  $this->postRepository->createPost($request);
        $image         =  $this->imageRepository->saveImagePath($request, $post->id);

    	return response()->json($post->with(['images'])->findOrFail($post->id), 201);
    }
    
    public function show($postId)
    {
    	return response()->json($this->postRepository->findById($postId), 201);
    }
    
    public function edit($postId)
    {
    	return response()->json($this->postRepository->findById($postId), 201);
    }

    public function update(PostRequest $request, $postId)
    {
    	return response()->json($this->postRepository->updatePost($postId), 201);
    }

    public function destroy($postId)
    {
    	return $this->postRepository->deletePost($postId);
    }
    
  
}

