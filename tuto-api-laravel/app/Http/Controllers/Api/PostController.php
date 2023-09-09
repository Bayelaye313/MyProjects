<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\createApiRequest;

class PostController extends Controller
{
    public function index(){

        return 'liste des articles';
    }
    public function store(createApiRequest $request){
        
        $post = new Post();
        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->save();
    }

}
