<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        $id = $this->route('post');
        $post = Post::find($id);
        return [
            'title' => [
                'required',
                'min:35',
                'max:70',
                Rule::unique('posts')->ignore($post->title, 'title')
            ],
            'description' => 'required|min:10|max:100',
            'content' => 'required|min:100',
            'category_id' => [
                'exists:categories,id'
            ],
        ];
    }
    
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.exists' => 'You have to select category.',
        ];
    }



}
