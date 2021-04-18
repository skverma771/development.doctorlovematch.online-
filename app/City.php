<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 *
 * @package App
 * @property string $name
 * @property string $state
*/
class City extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'state_id'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'state_id' => 'integer|exists:states,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'state_id' => 'integer|exists:states,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id')->withTrashed();
    }
    
    
}
