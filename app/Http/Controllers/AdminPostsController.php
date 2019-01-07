<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Route;
use View;
use Auth;
use Session;
use Exception;
use App\Http\Requests\{StorePostRequest,UpdatePostRequest};

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $data = Post::with("user","category")
                ->orderBy('created_at', 'DESC')
                ->paginate(7);
        }
        catch (Exception $e)
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

        return view('admin-posts.index',["posts"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::all();
        return view('admin-posts.create',["categories"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try
        {
            $data=$request->only('title', 'description', 'content','category_id');
            // add current user_id to post to refer to the creator
            $data=array_merge($data, ['user_id' => Auth::user()->id]);
            Post::create($data);
            Session::flash('message', 'Post added successfully');
            Session::flash('alert-class', 'alert-success');
        }
        catch (Exception $e)
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

        return redirect(route('posts.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $data = Post::findOrFail($id);
            $categories = Category::all();
        }
        catch (Exception $e)
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

        return view('admin-posts.edit',['post'=>$data,'categories'=> $categories]);
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
        try
        {
            $data=$request->only('title', 'description', 'content','category_id');
            // add current user_id to post
            $data=array_merge($data, ['user_id' => Auth::user()->id]);
            $post =  Post::findOrFail($id);
            $post->update($data);
            Session::flash('message', 'Post updated successfully');
            Session::flash('alert-class', 'alert-success');
        }
        catch (Exception $e)
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

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            Post::destroy($id);
        }
        catch (Exception $e)
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

        return response() -> json( [
            'message' => 'Successfully delete the post.',
            'data'    => null,
        ], 200);
    }
}
