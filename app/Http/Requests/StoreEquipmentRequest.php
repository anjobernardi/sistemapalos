<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
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
            'identification' => 'required|max:40',
            'serial_number' => 'nullable|max:20',
            'description' => 'nullable|max:100',
            'position' => 'nullable|max:50',
            'preventive' => 'nullable',
            'predictive' => 'nullable',
            'active' => 'nullable',
        ];
    }
}
