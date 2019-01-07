<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;
use Illuminate\Validation\Rule;
class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        try {
            $id = $this->route('category');
            $category = Category::find($id);
            return [
                'name' => [
                    'required',
                    'min:3',
                    Rule::unique('categories')->ignore($category->name, 'name')
                ],
            ];
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

    }
}
