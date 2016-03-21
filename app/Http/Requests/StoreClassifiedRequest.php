<?php

namespace App\Http\Request;

use App\Http\Requests\Request;

class StoreClassifiedRequest extends Request

{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'email' => 'required|email',
        ];
    }
}