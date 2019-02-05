<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
            'identification' => 'required|string|max:40',
            'serial_number' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:100',
            'position' => 'nullable|string|max:50',
            'preventive' => 'nullable|max:100',
            'predictive' => 'nullable|max:100',
            'active' => 'nullable|max:1',
        ];
    }
}
