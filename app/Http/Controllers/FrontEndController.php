<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index() {
        $site_name = Setting::first()->site_name;
        $first_four_categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        
        return view('welcome')
        ->with('title', $site_name)
        ->with('categories', $first_four_categories)
        ->with('first_post', $first_post)
        ->with('second_post', $second_post)
        ->with('third_post', $third_post);
    }
}
