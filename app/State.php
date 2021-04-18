<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @package App
 * @property string $name
 * @property string $country
*/
class State extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'country_id'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'country_id' => 'integer|exists:countries,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'country_id' => 'integer|exists:countries,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }
    
    
}
