<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Messagedelete
 *
 * @package App
 * @property string $from_user_id
 * @property string $to_id
 * @property string $msg_id
 * @property string $status
 * @property string $datetime
*/
class Messagedelete extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['from_user_id', 'to_id', 'msg_id', 'status', 'datetime'];
    

    public static function storeValidation($request)
    {
        return [
            'from_user_id' => 'max:191|nullable',
            'to_id' => 'max:191|nullable',
            'msg_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'from_user_id' => 'max:191|nullable',
            'to_id' => 'max:191|nullable',
            'msg_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
