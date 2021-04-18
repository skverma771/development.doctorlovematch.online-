<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Astrologycalcsign
 *
 * @package App
 * @property string $signfrom
 * @property string $signto
 * @property string $description
*/
class Astrologycalcsign extends Model
{
    use SoftDeletes;


    protected $fillable = ['signfrom', 'signto', 'description'];


    public static function storeValidation($request)
    {
        return [
            'signfrom' => 'max:191|nullable',
            'signto' => 'max:191|nullable',
            'description' => 'nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'signfrom' => 'max:191|nullable',
            'signto' => 'max:191|nullable',
            'description' => 'nullable'
        ];
    }






}
