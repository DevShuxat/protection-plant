<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'currency' => 'sometimes|required|in:UZS,USD',
            'unit' => 'sometimes|required|in:kg,pcs,pack',
            'stock' => 'nullable|integer',
            'main_image' => 'nullable|string',
        ];
    }
}

