<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personalityanswer
 *
 * @package App
 * @property string $userid
 * @property string $questionid
 * @property string $optionid
 * @property string $created
*/
class Personalityanswer extends Model
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
