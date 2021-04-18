<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @package App
 * @property string $questions
 * @property string $questions_type
*/
class Question extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['questions', 'questions_type'];
    

    public static function storeValidation($request)
    {
        return [
            'questions' => 'max:191|nullable',
            'questions_type' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'questions' => 'max:191|nullable',
            'questions_type' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
