<?php
namespace App\Http\Requests\Admin;

use App\Personalityanswer;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalityanswersRequest extends FormRequest
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
        return Personalityanswer::updateValidation($this);
    }
}
