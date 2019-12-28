<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;

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
 
    public function create()
    {
    	
    }

    public function store()
    {
    	
    }
    
    public function show()
    {
    	
    }
    
    public function edit()
    {
    	
    }

    public function update()
    {
    	
    }

    public function destroy()
    {
    	
    }
  
}

