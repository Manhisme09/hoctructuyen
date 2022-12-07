<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepReviewEditRequest extends FormRequest
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
            'rep_content_edit' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'rep_content_edit.required' => __('validation.required_review'),
        ];
    }
}
