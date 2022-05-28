<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Post, User};
use Illuminate\Support\Str;
use Auth;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortBy('created_at');
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => ['required','unique:posts'],
            'cover'     => ['required','image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'desc'      => ['required'],
            'category'  => ['required'],
            'keywords'  => ['required'],
            'meta_desc' => ['required'],
        ]);

        $post               = new Post();

        $cover              = $request->file('cover');

        if($cover){
            $cover_path     = $cover->store('images/blog', 'public');
            $post->cover    = $cover_path;
        }

        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->user_id      = Auth::user()->id;
        $post->category_id  = $request->category;
        $post->desc         = $request->desc;
        $post->keywords     = $request->keywords;
        $post->meta_desc    = $request->meta_desc;
        $post->save();


        Session::flash('alert_type', 'success');
        Session::flash('alert_message', 'Data Updated');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => ['required','unique:posts'],
            'cover'     => ['required','image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'desc'      => ['required'],
            'category'  => ['required'],
            'keywords'  => ['required'],
            'meta_desc' => ['required'],
        ]);

        $post = Post::findOrFail($id);

        $new_cover = $request->file('cover');

        if($new_cover){
            if($post->cover && file_exists(storage_path('app/public/' . $post->cover))){
                \Storage::delete('public/'. $post->cover);
            }

            $new_cover_path = $new_cover->store('images/blog', 'public');
            $post->cover = $new_cover_path;
        }

        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->user_id      = Auth::user()->id;
        $post->category_id  = $request->category;
        $post->desc         = $request->desc;
        $post->keywords     = $request->keywords;
        $post->meta_desc    = $request->meta_desc;
        $post->save();

        Session::flash('alert_type', 'success');
        Session::flash('alert_message', 'Data Updated');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('alert_message', 'Data Deleted');
        Session::flash('alert_type', 'warning');

        return redirect()->route('posts.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function trash(){
        $posts = Post::onlyTrashed()->get();
        return view('post.trash', compact('posts'));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id) {
        $post = Post::withTrashed()->findOrFail($id);

        if ($post->trashed()) {

            $post->restore();

            Session::flash('alert_message', 'Data Restored');
            Session::flash('alert_type', 'success');

            return redirect()->route('posts.trash');

        }else {

            Session::flash('alert_message', 'Data is not in trash');
            Session::flash('alert_type', 'warning');

            return redirect()->route('posts.trash');
        }
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function deletePermanent($id){
        $post = Post::withTrashed()->findOrFail($id);
        if (!$post->trashed()) {

            Session::flash('alert_message', 'Data is not in trash');
            Session::flash('alert_type', 'warning');

            return redirect()->route('posts.trash');

        }else {
            if($post->cover && file_exists(storage_path('app/public/' . $post->cover))){
                \Storage::delete('public/'. $post->cover);
            }

        $post->forceDelete();

        Session::flash('alert_message', 'Data Deleted');
        Session::flash('alert_type', 'warning');

        return redirect()->route('posts.trash');
        }
    }
}
