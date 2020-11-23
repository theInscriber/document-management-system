<?php

namespace App\Modules\Documents\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetachDocumentDepartmentsRequest extends FormRequest
{
    /**
     * Determine if the role is authorized to make this request.
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
        return config('documents.validation_rules.departments.detach');
    }
}