<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Blockuser
 *
 * @package App
 * @property string $user_id
 * @property string $block_user_id
 * @property string $status
 * @property string $created
*/
class Blockuser extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['user_id', 'block_user_id', 'status', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'block_user_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'max:191|nullable',
            'block_user_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
