<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category,Post};
use Exception;
use Session;
use App\Http\Requests\{UpdateCategoryRequest,StoreCategoryRequest};
use Response;

class AdminCategoriesController extends Controller
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
            $data = Category::orderBy('created_at', 'DESC')
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

        return view('admin-categories.index',["categories"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try
        {
            $data=$request->only('name');
            Category::create($data);
            Session::flash('message', 'Category added successfully');
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

        return redirect(route('categories.index'));
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
            $data = Category::findOrFail($id);
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

        return view('admin-categories.edit',['category'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try
        {
            $data=$request->only('name');
            $category  =  Category::findOrFail($id);
            $category->update($data);
            Session::flash('message', 'Category updated successfully');
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

        return redirect(route('categories.index'));
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
            // delete all posts under this category then delete it
            $posts=Category::findOrFail($id)->posts;
            if ($posts)
            {
                foreach ($posts as $post)
                {
                    Post::destroy($post->id);
                }
            }
            Category::destroy($id);
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
            'message' => 'Successfully delete the category.',
            'data'    => null,
        ], 200);
    }
}
