<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
            'icon' => 'nullable|image',
            'title.*' => 'required',
            'description.*' => 'required',
        ];
    }


}
