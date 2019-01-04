<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\{StorePostRequest,UpdatePostRequest};
use App\Post;
use View;
class PostsController extends Controller
{
    public function __construct()
    {
        // Fetch the Site Settings object
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
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return view('posts.index', ['posts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
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
//            dd($data);
        }catch (\Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return view('posts.show', ['post' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        //
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
    }
}
