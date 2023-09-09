<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\createApiRequest;
use App\Http\Requests\editPostRequest;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        try {
            $query= Post::query();
            $perpage=3;
            $page= $request->input('page',1);
            $search = $request->input('search');
            if($search){
                $query->whereRaw("titre LIKE '%". $search. "%'");
            }
            $total = $query->count();
            $result = $query->offset(($page-1)*$perpage)->limit($perpage)->get();

            return response()->json([
                'status_code'=>200,
                'status_message'=> 'les posts recupérés',
                'current_page'=>$page,
                'last_page'=>ceil($total/$perpage),
                'items'=>$result
               ]);
        } catch (Exception $e) {
            return response()->json($e);
        }

        return 'liste des articles';
    }
    public function store(createApiRequest $request){
        try {
            $post = Post::create($request->all());

            return response()->json([
             'status_code'=>200,
             'status_message'=> 'le post à été ajouté',
             'data'=>$post
            ]);
     
        } catch (Exception $e) {
            return response()->json($e);
        }
        
    }
    public function update(editPostRequest $request, Post $post){
        try {
            $post->update([
                'titre'=> $request->titre,
                'description' => $request->description
            ]);
            return response()->json([
                'status_code'=>200,
                'status_message'=> 'le post à été modifié',
                'data'=>$post
               ]);
   
    
        } catch (Exception $me) {
            return response()->json($me);
        }
    }
    public function destroy(Post $post){
        try {
            if ($post) {
                $post->delete();
                return response()->json([
                    'status_code'=>200,
                    'status_message'=> 'le post à été supprimé',
                    'data'=>$post
                   ]);    
            }else{
                return response()->json([
                    'status_code'=>422,
                    'status_message'=> 'enregistrement introuvable',
                    'data'=>$post
                   ]);
    
            }
            
        } catch (Exception $e) {
           return response()->json($e);
        }

    }

}
