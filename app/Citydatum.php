<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Citydatum
 *
 * @package App
 * @property string $name
 * @property string $countrycode
 * @property string $district
 * @property string $population
*/
class Citydatum extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'countrycode', 'district', 'population'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'countrycode' => 'max:191|nullable',
            'district' => 'max:191|nullable',
            'population' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'countrycode' => 'max:191|nullable',
            'district' => 'max:191|nullable',
            'population' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
