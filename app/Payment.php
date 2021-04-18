<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 *
 * @package App
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $zipcode
 * @property string $country
 * @property string $payment_status
 * @property string $txn_id
 * @property string $txn_type
 * @property string $payer_email
 * @property string $payment_gross
 * @property string $created
*/
class Payment extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['user_id', 'first_name', 'last_name', 'zipcode', 'country', 'payment_status', 'txn_id', 'txn_type', 'payer_email', 'payment_gross', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'first_name' => 'max:191|nullable',
            'last_name' => 'max:191|nullable',
            'zipcode' => 'max:191|nullable',
            'country' => 'max:191|nullable',
            'payment_status' => 'max:191|nullable',
            'txn_id' => 'max:191|nullable',
            'txn_type' => 'max:191|nullable',
            'payer_email' => 'max:191|nullable',
            'payment_gross' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'first_name' => 'max:191|nullable',
            'last_name' => 'max:191|nullable',
            'zipcode' => 'max:191|nullable',
            'country' => 'max:191|nullable',
            'payment_status' => 'max:191|nullable',
            'txn_id' => 'max:191|nullable',
            'txn_type' => 'max:191|nullable',
            'payer_email' => 'max:191|nullable',
            'payment_gross' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
