<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
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
            'first' => 'required|numeric|digits:1',
            'second' => 'required|numeric|digits:1',
            'third' => 'required|numeric|digits:1',
            'fourth' => 'required|numeric|digits:1',
            'fifth' => 'required|numeric|digits:1',
            'sixth' => 'required|numeric|digits:1',
        ];
    }
}
