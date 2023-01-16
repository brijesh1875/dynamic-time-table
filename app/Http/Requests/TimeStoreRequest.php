<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'working_days' => 'required|numeric|between:1,7',
            'sub_per_day' => 'required|numeric|between:1,9',
            'subject' => 'required|numeric|gte:1',
        ];
    }
}
