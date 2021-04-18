<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Userspaymentsplan
 *
 * @package App
 * @property string $user_id
 * @property string $payment_id
 * @property string $plan_id
 * @property string $plan_date
 * @property string $expire_date
*/
class Userspaymentsplan extends Model
{
    use SoftDeletes;


    protected $fillable = ['user_id', 'payment_id', 'plan_id', 'plan_date', 'expire_date'];


    public static function storeValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'payment_id' => 'max:191|nullable',
            'plan_id' => 'max:191|nullable',
            'plan_date' => 'max:191|nullable',
            'expire_date' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'payment_id' => 'max:191|nullable',
            'plan_id' => 'max:191|nullable',
            'plan_date' => 'max:191|nullable',
            'expire_date' => 'max:191|nullable'
        ];
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class ,'payment_id');
    }






}
