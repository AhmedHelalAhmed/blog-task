<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use View;
class PostsController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try
        {
            $data = Post::with("user","category")->orderBy('created_at', 'DESC')->paginate(7);
        }
        catch (\Exception $e)
        {
            // for production
            return view('errors.404',['error'=>$e->getMessage()]);

            // for debug
            /*
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
            */
        }

        return view('posts.index', ['posts' => $data]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Post::findOrFail($id);
        }catch (\Exception $e)
        {
            // for production
            return view('errors.404',['error'=>$e->getMessage()]);

            // for debug
            /*
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
            */
        }

        return view('posts.show', ['post' => $data]);

    }


}
