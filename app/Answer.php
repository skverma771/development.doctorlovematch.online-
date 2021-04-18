<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Answer
 *
 * @package App
 * @property string $userid
 * @property string $questionid
 * @property string $optionid
 * @property string $created
*/
class Answer extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['userid', 'questionid', 'optionid', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'questionid' => 'max:191|nullable',
            'optionid' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'userid' => 'max:191|nullable',
            'questionid' => 'max:191|nullable',
            'optionid' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
