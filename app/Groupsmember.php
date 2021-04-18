<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Groupsmember
 *
 * @package App
 * @property string $groupid
 * @property string $memberid
 * @property string $approved
 * @property string $requestrecbyid
 * @property string $created
*/
class Groupsmember extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['groupid', 'memberid', 'approved', 'requestrecbyid', 'created'];
    

    public static function storeValidation($request)
    {
        return [
            'groupid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'approved' => 'max:191|nullable',
            'requestrecbyid' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'groupid' => 'max:191|nullable',
            'memberid' => 'max:191|nullable',
            'approved' => 'max:191|nullable',
            'requestrecbyid' => 'max:191|nullable',
            'created' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
