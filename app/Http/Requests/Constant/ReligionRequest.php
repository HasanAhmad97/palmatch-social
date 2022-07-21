<?php

namespace App\Http\Requests\Constant;

use Illuminate\Foundation\Http\FormRequest;

class ReligionRequest extends FormRequest
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
        return [
            //
            'language' => 'required|in:' . implode(',', config('languages.supported')),
            'title.*' => 'required',
        ];
    }
}
