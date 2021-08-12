<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;

use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    //criar registro
    public function store(StoreUpdatePost $request) {
        $post = Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()
            ->route('posts.index')
            ->with('message', 'Post criado com sucesso!');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()->route('posts.index');
        }
        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post deletado com sucesso!');
           
    }

    public function edit($id) {
        if(!$post = Post::find($id)) {
            return redirect()->back(); //o redirect back retorna de onde veio
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id) {
        if(!$post = Post::find($id)) {
            return redirect()->back(); //o redirect back retorna de onde veio
        }
        $post->update($request->all());
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com sucesso!');
    }

    public function search(Request $request) {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(5);

        return view('admin.posts.index', compact('posts', 'filters'));
    }
}
