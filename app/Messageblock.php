<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Messageblock
 *
 * @package App
 * @property string $user_id
 * @property string $member_id
 * @property string $isblock
 * @property string $isspamorreport
*/
class Messageblock extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['user_id', 'member_id', 'isblock', 'isspamorreport'];
    

    public static function storeValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'member_id' => 'max:191|nullable',
            'isblock' => 'max:191|nullable',
            'isspamorreport' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'member_id' => 'max:191|nullable',
            'isblock' => 'max:191|nullable',
            'isspamorreport' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
