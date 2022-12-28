<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
        ];
    }
}
