<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AreaUpdateRequest extends FormRequest
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
            'start_on' => ['date', 'required'],
            'end_on' => ['date', 'after:start_on', 'nullable'],
            'supplier_id' => ['integer', 'exists:suppliers,id', 'required'],
            'area_code' => ['integer', 'between:1,10', 'required'],
            'gen_upload_code' => ['string', 'nullable'],
            'is_retail' => ['boolean'],
            'is_spot' => ['boolean'],
            'user_id' => ['integer', 'exists:users,id', 'required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['user_id' => Auth::id()]);
    }
}
