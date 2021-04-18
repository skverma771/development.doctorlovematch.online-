<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Countrylanguage
 *
 * @package App
 * @property string $countrycode
 * @property string $language
 * @property string $isofficial
 * @property string $percentage
*/
class Countrylanguage extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['countrycode', 'language', 'isofficial', 'percentage'];
    

    public static function storeValidation($request)
    {
        return [
            'countrycode' => 'max:191|nullable',
            'language' => 'max:191|nullable',
            'isofficial' => 'max:191|nullable',
            'percentage' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'countrycode' => 'max:191|nullable',
            'language' => 'max:191|nullable',
            'isofficial' => 'max:191|nullable',
            'percentage' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
