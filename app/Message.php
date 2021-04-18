<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @package App
 * @property string $msg_id
 * @property text $message
 * @property string $datetime
*/
class Message extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['msg_id', 'message', 'datetime'];
    

    public static function storeValidation($request)
    {
        return [
            'msg_id' => 'max:191|nullable',
            'message' => 'max:65535|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'msg_id' => 'max:191|nullable',
            'message' => 'max:65535|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
