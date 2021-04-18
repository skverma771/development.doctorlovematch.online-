<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Weeklyhit
 *
 * @package App
 * @property string $hits
 * @property string $created
*/
class Weeklyhit extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['hits', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'hits' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'hits' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
