<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class 
PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Validando o ID do usuário antes de criar o post

        // if($this->user_id == auth()->user()->id){
        //     return true;
        // }else{
        //     return false;
        // }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' =>  'image'
        ];

        if($post){

            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        // Se a condição para "status = 2" for true
        // Abre um novo array de validação. 

        // Se status 2 todos os campos precisam ser requeridos.
        
        if($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }

        return $rules;
    }
}
