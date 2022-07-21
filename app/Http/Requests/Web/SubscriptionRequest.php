<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'duration' => 'required|numeric',
            'duration_type' => 'required|in:month,year',
            'cost' => 'required|numeric',
            'title.*' => 'required',
            'description.*' => 'required',
        ];
    }
}
