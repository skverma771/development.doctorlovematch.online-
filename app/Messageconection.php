<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Messageconection
 *
 * @package App
 * @property string $msg_id
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $notifystatus
 * @property string $notifycancelstatus
 * @property string $paymentstatus
 * @property string $readstatus
*/
class Messageconection extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['msg_id', 'sender_id', 'receiver_id', 'notifystatus', 'notifycancelstatus', 'paymentstatus', 'readstatus'];
    

    public static function storeValidation($request)
    {
        return [
            'msg_id' => 'max:191|nullable',
            'sender_id' => 'max:191|nullable',
            'receiver_id' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable',
            'paymentstatus' => 'max:191|nullable',
            'readstatus' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'msg_id' => 'max:191|nullable',
            'sender_id' => 'max:191|nullable',
            'receiver_id' => 'max:191|nullable',
            'notifystatus' => 'max:191|nullable',
            'notifycancelstatus' => 'max:191|nullable',
            'paymentstatus' => 'max:191|nullable',
            'readstatus' => 'max:191|nullable'
        ];
    }

    function  message()
    {
        return $this->hasOne(Message::class,'id','msg_id');
    }
    function  user()
    {
        return $this->hasOne(User::class,'id','sender_id');
    }
    function  usermyside()
    {
        return $this->hasOne(User::class,'id','receiver_id');
    }
    public static function boot() {
        parent::boot();
    
        static::deleting(function($post) {
            // here you could instantiate each related Comment
            // in this way the boot function in the Comment model will be called
            $post->message->each(function($message) {
                // and then the static::deleting method when you delete each one
                $message->delete();
            });
    
        });
    }
    
}
