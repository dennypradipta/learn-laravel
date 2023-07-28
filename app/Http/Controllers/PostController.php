<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    public function get(Request $request) {
        return new PostCollection(Post::paginate(8));
    }

    public function post(Request $request) {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = $request->author_id;
        $post->save();

        return response()->json(['message' => 'Successfully created new post', 'data' => json_decode($post)], 201);
    }

    public function getByID(Request $request, $id) {
        $post = new PostResource(Post::findOrFail($id));

        return response()->json(['message' => 'Successfully get post by ID', 'data' => $post], 200);
    }

    public function put(Request $request, $id) {
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = $request->author_id;
        $post->save();

        return response()->json(['message' => 'Successfully edited the post', 'data' => json_decode($post)], 202);
    } 

    public function delete(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Successfully deleted the post', 'data' => json_decode($post)], 204);
    } 
}
