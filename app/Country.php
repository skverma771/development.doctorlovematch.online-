<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 *
 * @package App
 * @property string $sortname
 * @property string $name
*/
class Country extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['sortname', 'name'];
    

    public static function storeValidation($request)
    {
        return [
            'sortname' => 'max:191|nullable',
            'name' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'sortname' => 'max:191|nullable',
            'name' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
