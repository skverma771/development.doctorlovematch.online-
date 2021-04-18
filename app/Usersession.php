<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usersession
 *
 * @package App
 * @property string $userid
 * @property string $username
 * @property string $userstatus
 * @property string $created
*/
class Usersession extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['userid', 'username', 'userstatus', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'username' => 'max:191|nullable',
            'userstatus' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'username' => 'max:191|nullable',
            'userstatus' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
