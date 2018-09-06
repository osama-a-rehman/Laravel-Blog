<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        //
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0){
            Session::flash("info", "You must have some categories before attempting to Create a New Post");

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title' => 'required|max:255',
            'featured_image' => 'required|image',
            'category_id' => 'required',
            'content' => 'required:',
        ]);

        //dd($request->all());
        
        $featured_image = $request->featured_image;
        $featured_image_name = md5(time().$featured_image->getClientOriginalName()).$featured_image->getClientOriginalName();
        //$featured_image_name = md5(time().$featured_image->getClientOriginalName();

        $featured_image->move('uploads/posts', $featured_image_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => 'uploads/posts/'.$featured_image_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Post Created Successfully');

        return redirect()->back();
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
        $post = Post::find($id);
        $categories = Category::all();

        if($categories->count() == 0){
            Session::flash("info", "You must have some categories before attempting to Create a New Post");

            return redirect()->back();
        }

        return view('admin.posts.edit')->with('post', $post)->with('categories', $categories);
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured_image')) {
            $featured_image = $request->featured_image;

            $featured_image_name = md5(time().$featured_image->getClientOriginalName()).$featured_image->getClientOriginalName();
            //$featured_image_name = md5(time().$featured_image->getClientOriginalName();
    
            $featured_image->move('uploads/posts', $featured_image_name);
    
            $post->featured_image = 'uploads/posts/'.$featured_image_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('success', 'Post Updated Successfully');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', "Post has been successfully deleted");

        return redirect()->back();
    }

    public function show_deleted_posts() {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.deleted')->with("posts", $posts);
    }

    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash("success", "Post has been restored successfully");

        return redirect()->route("posts");
    }

    public function perm_delete($id) {
        $post = Post::withTrashed()->where('id', $id)->first();

        //dd($post);

        $post->forceDelete();

        Session::flash('success', "Post permanently deleted successfully");

        return redirect()->back();
    }
}
