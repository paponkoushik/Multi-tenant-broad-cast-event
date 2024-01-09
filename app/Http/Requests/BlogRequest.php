<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function rules(): array
    {
//        dd($this->all());
        return array(
            'title' => 'required',
            'description' => 'required'
        );
    }
}
