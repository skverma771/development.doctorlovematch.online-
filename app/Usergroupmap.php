<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usergroupmap
 *
 * @package App
 * @property string $user_id
 * @property string $group_id
*/
class Usergroupmap extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['user_id', 'group_id'];
    

    public static function storeValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'group_id' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'group_id' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
