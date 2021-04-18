<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questionoption
 *
 * @package App
 * @property string $options
*/
class Questionoption extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['options'];
    

    public static function storeValidation($request)
    {
        return [
            'questionid' => 'array|nullable',
            'questionid.*' => 'integer|exists:questions,id|max:4294967295|nullable',
            'options' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'questionid' => 'array|nullable',
            'questionid.*' => 'integer|exists:questions,id|max:4294967295|nullable',
            'options' => 'max:191|nullable'
        ];
    }

    

    
    
    public function questionid()
    {
        return $this->belongsToMany(Question::class, 'question_questionoption')->withTrashed();
    }
    
    
}
