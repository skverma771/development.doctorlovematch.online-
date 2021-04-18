<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Astrologycalc
 *
 * @package App
 * @property string $zodiac
 * @property string $daterange
 * @property string $zodiac_images
*/
class Astrologycalc extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['zodiac', 'daterange', 'zodiac_images'];
    

    public static function storeValidation($request)
    {
        return [
            'zodiac' => 'max:191|nullable',
            'daterange' => 'max:191|nullable',
            'zodiac_images' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'zodiac' => 'max:191|nullable',
            'daterange' => 'max:191|nullable',
            'zodiac_images' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
