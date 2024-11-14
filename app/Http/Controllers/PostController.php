<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        $post->save();

        return response()->json('successfully added');
    }

    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function show()
    {
        return view('post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }

    public function adminIndex() {
        $posts = DB::table('posts')->select(['posts.*', 'categories.name as categoryName'])
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->get();
        return view('admin/post/index', ['posts' => $posts]);
    }

    public function create(){
        $ca = Category::all();
        return view("admin/post/create", ['ca' => $ca]);
    }

    public function addNew(PostRequest $request){
        $post = new  Post($request->all());
        $post->save();
        return redirect(route("post.index"));
    }
}
