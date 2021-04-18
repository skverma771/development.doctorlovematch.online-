<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Uservideo
 *
 * @package App
 * @property string $videourl
 * @property string $user_id
 * @property string $title
 * @property string $location
 * @property string $datetime
 * @property string $description
 * @property string $viewed
*/
class Uservideo extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['videourl', 'user_id', 'title', 'location', 'datetime', 'description', 'viewed'];
    

    public static function storeValidation($request)
    {
        return [
            'videourl' => 'max:191|nullable',
            'user_id' => 'max:191|nullable',
            'title' => 'max:191|nullable',
            'location' => 'max:191|nullable',
            'datetime' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'viewed' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'videourl' => 'max:191|nullable',
            'user_id' => 'max:191|nullable',
            'title' => 'max:191|nullable',
            'location' => 'max:191|nullable',
            'datetime' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'viewed' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
