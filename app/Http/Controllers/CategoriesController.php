<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use View;
use App\Http\Requests\{StoreCategoryRequest,UpdateCategoryRequest};
class CategoriesController extends Controller
{

    public function __construct()
    {
        // Fetch the Site Settings object
        $categories = Category::all();
        View::share('categories', $categories);
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
            $data = Category::findOrFail($id);
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
        return view('categories.show', ['category' => $data]);
    }

}
