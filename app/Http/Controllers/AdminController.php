<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
            $numberOfUsers=count(User::all());
            $numberOfPosts=count(Post::all());
            $numberOfCategories=count(Category::all());
            $data= ["numberOfUsers"=>$numberOfUsers,
                    "numberOfPosts"=>$numberOfPosts,
                    "numberOfCategories"=>$numberOfCategories];
        }
        catch (\Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
        return view('admin.index',$data);
    }

}
