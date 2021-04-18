<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriptionplan
 *
 * @package App
 * @property string $plan_name
 * @property string $plan_amount
*/
class Subscriptionplan extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['plan_name', 'plan_amount'];
    

    public static function storeValidation($request)
    {
        return [
            'plan_name' => 'max:191|nullable',
            'plan_amount' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'plan_name' => 'max:191|nullable',
            'plan_amount' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
