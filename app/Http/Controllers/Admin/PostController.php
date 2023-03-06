<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $validationRules = [
        'title' => ['required', 'unique:posts' ],
        'post_date' => 'required',
        'content' => 'required',
        'image_path' => 'required|image',
        'type_id' => 'required|exists:types,id',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [ 'post' => new Post(), 'types' => Type::all() ]);

    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // to validate the datas
        $data = $request->validate($this->validationRules);
        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $data['image_path'] = Storage::put('uploads', $data['image_path']); // dico al campo del DB di salvare la foto inserita dall'utente
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost)->with('msg', "Post $newPost->title has been created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) // in alternativa: dependency injection -> DA UN ID COME INPUT DAMMI IL COMIC E FAI IN AUTOMATICO LA FIND OR FAIL
    {
        return view('admin.posts.show', compact('post')); // ritorna la view show e l'elemento preso dal DB
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [ 'post' => $post, 'types' => Type::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id)],
            'post_date' => 'required',
            'content' => 'required',
            'type_id' => 'required|exists:types,id',
        ],
        [
            'title' => 'Inserire un titolo',
            'post_date' => 'Inserire una data',
            'content' => 'Inserire un testo',
            'type_id' => 'Inserire un tipo',
        ]);
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
