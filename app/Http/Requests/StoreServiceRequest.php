<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'=>'required',
            'time'=>'bail|required|after:09:00|before:21:00',
            'day'=>'required',
            'station'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'time.after' => 'the open time for our Carwash is 9:00',
        ];
    }
}
