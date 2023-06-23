<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.posts',[
            'posts' => Post::where('penulis_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "judul" => "max:100|required",
            'slug' => "required|max:100|unique:posts",
            "isi" => "required",
            'image' => 'image|max:1024',
            'category_id' => 'required',
        ]);

        if ($request->image) {
            $validate['image'] = $request->image->store('post-iamge');
        }

        $validate['excerpt'] = Str::excerpt($validate['isi'], ' ', [
            'radius' => 100
        ]);
        $validate['penulis_id'] = Auth::user()->id;
        Post::create($validate);
        return redirect('/dashboard/posts')->with('success', 'Blog berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('dashboard.posts.edit', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rule =  [
            "judul" => "max:100|required",
            "isi" => "required",
            'image' => 'image|max:1024',
            'category_id' => 'required'
        ];

        if ($request['slug'] != $post['slug']) {
            $rule['slug'] = "required|max:100|unique:posts";
        }

        $validate = $request->validate($rule);

        $validate['excerpt'] = Str::excerpt($request['isi'], ' ', [
            'radius' => 100
        ]);


        if ($request->image) {
            if($request->oldImage) {
                Storage::delete(asset('storage/' . $request->oldImage));
            }
            $validate['image'] = $request->image->store('post-iamge');
        }

        $validate['penulis_id'] = Auth::user()->id;
        Post::where('id', $post->id)->update($validate);
        return redirect('/dashboard/posts')->with('success', 'Blog berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post['image']) {
            Storage::delete(asset('storage/' . $post->oldImage));
        }
       $post =  Post::destroy($post->id);
       return redirect("/dashboard/posts");
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
