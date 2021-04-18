<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Countrydatum
 *
 * @package App
 * @property string $code
 * @property string $name
 * @property string $continent
 * @property string $region
 * @property string $surfacearea
 * @property string $indepyear
 * @property string $population
 * @property string $lifeexpectancy
 * @property string $gnp
 * @property string $gnpold
 * @property string $localname
 * @property string $governmentform
 * @property string $headofstate
 * @property string $capital
 * @property string $code2
*/
class Countrydatum extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['code', 'name', 'continent', 'region', 'surfacearea', 'indepyear', 'population', 'lifeexpectancy', 'gnp', 'gnpold', 'localname', 'governmentform', 'headofstate', 'capital', 'code2'];
    

    public static function storeValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'name' => 'max:191|nullable',
            'continent' => 'max:191|nullable',
            'region' => 'max:191|nullable',
            'surfacearea' => 'max:191|nullable',
            'indepyear' => 'max:191|nullable',
            'population' => 'max:191|nullable',
            'lifeexpectancy' => 'max:191|nullable',
            'gnp' => 'max:191|nullable',
            'gnpold' => 'max:191|nullable',
            'localname' => 'max:191|nullable',
            'governmentform' => 'max:191|nullable',
            'headofstate' => 'max:191|nullable',
            'capital' => 'max:191|nullable',
            'code2' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'name' => 'max:191|nullable',
            'continent' => 'max:191|nullable',
            'region' => 'max:191|nullable',
            'surfacearea' => 'max:191|nullable',
            'indepyear' => 'max:191|nullable',
            'population' => 'max:191|nullable',
            'lifeexpectancy' => 'max:191|nullable',
            'gnp' => 'max:191|nullable',
            'gnpold' => 'max:191|nullable',
            'localname' => 'max:191|nullable',
            'governmentform' => 'max:191|nullable',
            'headofstate' => 'max:191|nullable',
            'capital' => 'max:191|nullable',
            'code2' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
