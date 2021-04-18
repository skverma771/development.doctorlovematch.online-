<?php
namespace App\Http\Requests\Admin;

use App\Subscriptionplan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionplansRequest extends FormRequest
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
        return Subscriptionplan::updateValidation($this);
    }
}
