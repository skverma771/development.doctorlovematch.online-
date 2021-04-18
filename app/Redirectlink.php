<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Redirectlink
 *
 * @package App
 * @property string $old_url
 * @property string $new_url
 * @property string $referer
 * @property string $comment
 * @property string $hits
 * @property string $published
 * @property string $created_date
 * @property string $modified_date
 * @property string $header
*/
class Redirectlink extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['old_url', 'new_url', 'referer', 'comment', 'hits', 'published', 'created_date', 'modified_date', 'header'];
    

    public static function storeValidation($request)
    {
        return [
            'old_url' => 'max:191|nullable',
            'new_url' => 'max:191|nullable',
            'referer' => 'max:191|nullable',
            'comment' => 'max:191|nullable',
            'hits' => 'max:191|nullable',
            'published' => 'max:191|nullable',
            'created_date' => 'max:191|nullable',
            'modified_date' => 'max:191|nullable',
            'header' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'old_url' => 'max:191|nullable',
            'new_url' => 'max:191|nullable',
            'referer' => 'max:191|nullable',
            'comment' => 'max:191|nullable',
            'hits' => 'max:191|nullable',
            'published' => 'max:191|nullable',
            'created_date' => 'max:191|nullable',
            'modified_date' => 'max:191|nullable',
            'header' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
