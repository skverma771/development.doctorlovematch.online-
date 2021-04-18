<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personalityoption
 *
 * @package App
 * @property string $options
*/
class Personalityoption extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['options'];
    

    public static function storeValidation($request)
    {
        return [
            'questionid' => 'array|nullable',
            'questionid.*' => 'integer|exists:personalityquestions,id|max:4294967295|nullable',
            'options' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'questionid' => 'array|nullable',
            'questionid.*' => 'integer|exists:personalityquestions,id|max:4294967295|nullable',
            'options' => 'max:191|nullable'
        ];
    }

    

    
    
    public function questionid()
    {
        return $this->belongsToMany(Personalityquestion::class, 'personalityoption_personalityquestion')->withTrashed();
    }
    
    
}
