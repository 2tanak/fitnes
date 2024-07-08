<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
  
    public function rules()
    {
        return [
            //'title' => 'required|string',
            //'description' => 'required|string',
            'image' => 'required|file',
        ];
    }
}
