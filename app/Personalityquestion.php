<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personalityquestion
 *
 * @package App
 * @property string $question
*/
class Personalityquestion extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['question'];
    

    public static function storeValidation($request)
    {
        return [
            'question' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'question' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
