<?php
namespace App\Http\Requests\Admin;

use App\Astrologycalc;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAstrologycalcsRequest extends FormRequest
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
        return Astrologycalc::updateValidation($this);
    }
}
