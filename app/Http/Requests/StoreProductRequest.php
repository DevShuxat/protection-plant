<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'currency' => 'required|in:UZS,USD',
            'unit' => 'required|in:kg,pcs,pack',
            'stock' => 'nullable|integer',
            'main_image' => 'nullable|string',
        ];
    }
}

