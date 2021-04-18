<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usercommeetrequest
 *
 * @package App
 * @property string $userid
 * @property string $memberid
 * @property string $userrequest
 * @property string $userresponse
 * @property string $datetime
*/
class Usercommeetrequest extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['userid', 'memberid', 'userrequest', 'userresponse', 'datetime'];
    

    public static function storeValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'userrequest' => 'max:191|nullable',
            'userresponse' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'userrequest' => 'max:191|nullable',
            'userresponse' => 'max:191|nullable',
            'datetime' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
