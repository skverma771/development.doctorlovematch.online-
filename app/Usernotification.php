<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usernotification
 *
 * @package App
 * @property string $catgories
 * @property string $userid
 * @property string $memberid
 * @property string $notifystatus
 * @property string $datetime
 * @property string $requestid
 * @property string $notifycancelstatus
*/
class Usernotification extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['catgories', 'userid', 'memberid', 'notifystatus', 'datetime', 'requestid', 'notifycancelstatus'];
    

    public static function storeValidation($request)
    {
        return [
            'catgories' => 'max:191|nullable',
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'datetime' => 'max:191|nullable',
            'requestid' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'catgories' => 'max:191|nullable',
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'datetime' => 'max:191|nullable',
            'requestid' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
