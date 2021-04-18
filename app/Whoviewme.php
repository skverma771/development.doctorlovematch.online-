<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Whoviewme
 *
 * @package App
 * @property string $userid
 * @property string $memberid
 * @property string $notifystatus
 * @property string $notifycancelstatus
 * @property string $datetime
*/
class Whoviewme extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['userid', 'memberid', 'notifystatus', 'notifycancelstatus', 'datetime'];
    

    public static function storeValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
