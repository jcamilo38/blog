<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts= Post::all();

        return view('posts', ['categories' => $categories,
                              'posts' =>$posts]);
    }




    public function post($postId)
    {
        // Obtener evento
        $post = Post::find($postId);
        $latestPosts = Post::orderBy('id','DESC')->take(5)->get();
        return view('post', [
            'post'=> $post,
            'latestPosts'=>$latestPosts    
        ]);
    }

    public function nl2br($string)
    {
      return preg_replace('/\R/u', '<br/>', $string);
    }



    public function postByCategory($category)
    {
        $categories = Category::all();
        $category= Category::where('name','=' ,$category)->first();
        $categoryIdSelected = $category->id;
        $posts = Post::where('category_id', '=', $categoryIdSelected)->get();
        return view('posts', [
            'categories' => $categories,
            'posts' =>$posts,
            'categoryIdSelected' => $categoryIdSelected
        ]);
    }
}
