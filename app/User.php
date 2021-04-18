<?php
namespace App;

use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Carbon\Carbon;
use Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $matchstatus
 * @property string $customer_id
 * @property string $status
 * @property string $cancelmembership
 * @property string $unsubscribeemail
 * @property string $usersubscribe
 * @property string $shareedit
 * @property string $sharetime
 * @property string $block
 * @property string $sendemail
 * @property string $lastvisitdate
 * @property string $activation
 * @property string $params
 * @property string $lastresettime
 * @property string $resetcount
 * @property string $otpkey
 * @property string $otep
 * @property string $requirereset
 * @property string $lookingfor
 * @property string $ethnicity
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $gender
 * @property string $personality
 * @property text $aboutme
 * @property string $dob
 * @property string $devicetype
 * @property string $devicetoken
 * @property string $facebookid
 * @property string $gmailid
 * @property string $ntcount
 */
class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait,HasApiTokens;


    protected $fillable = ['license','name', 'email', 'password', 'remember_token', 'matchstatus', 'customer_id', 'status', 'cancelmembership', 'unsubscribeemail', 'usersubscribe', 'shareedit', 'sharetime', 'block', 'sendemail', 'lastvisitdate', 'activation', 'params', 'lastresettime', 'resetcount', 'otpkey', 'otep', 'requirereset', 'lookingfor', 'ethnicity', 'gender', 'personality', 'aboutme', 'dob', 'devicetype', 'devicetoken', 'facebookid', 'gmailid', 'ntcount', 'country_id', 'state_id', 'city_id','pictures'];
    protected $hidden = ['password', 'remember_token'];
//    protected $with = ['media'];

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'email' => 'email|max:191|required|unique:users,email',
            'password' => 'required',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'matchstatus' => 'max:191|nullable',
            'customer_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'cancelmembership' => 'max:191|nullable',
            'unsubscribeemail' => 'max:191|nullable',
            'usersubscribe' => 'max:191|nullable',
            'shareedit' => 'max:191|nullable',
            'sharetime' => 'max:191|nullable',
            'block' => 'max:191|nullable',
            'sendemail' => 'max:191|nullable',
            'lastvisitdate' => 'max:191|nullable',
            'activation' => 'max:191|nullable',
            'params' => 'max:191|nullable',
            'lastresettime' => 'max:191|nullable',
            'resetcount' => 'max:191|nullable',
            'otpkey' => 'max:191|nullable',
            'otep' => 'max:191|nullable',
            'requirereset' => 'max:191|nullable',
            'lookingfor' => 'in:Male,Female|max:191|nullable',
            'ethnicity' => 'max:191|nullable',
            'country_id' => 'integer|exists:countries,id|max:4294967295|nullable',
            'state_id' => 'integer|exists:states,id|max:4294967295|nullable',
            'city_id' => 'integer|exists:cities,id|max:4294967295|nullable',
            'gender' => 'in:Male,Female,Other|max:191|nullable',
            'personality' => 'max:191|nullable',
            'aboutme' => 'max:65535|nullable',
            'dob' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'devicetype' => 'max:191|nullable',
            'devicetoken' => 'max:191|nullable',
            'facebookid' => 'max:191|nullable',
            'gmailid' => 'max:191|nullable',
            'ntcount' => 'max:191|nullable',
            'pictures' => 'nullable',
            'online' => 'nullable',
            'license' => 'nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'email' => 'email|max:191|required|unique:users,email,'.$request->route('user'),
            'password' => '',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'matchstatus' => 'max:191|nullable',
            'customer_id' => 'max:191|nullable',
            'status' => 'max:191|nullable',
            'cancelmembership' => 'max:191|nullable',
            'unsubscribeemail' => 'max:191|nullable',
            'usersubscribe' => 'max:191|nullable',
            'shareedit' => 'max:191|nullable',
            'sharetime' => 'max:191|nullable',
            'block' => 'max:191|nullable',
            'sendemail' => 'max:191|nullable',
            'lastvisitdate' => 'max:191|nullable',
            'activation' => 'max:191|nullable',
            'params' => 'max:191|nullable',
            'lastresettime' => 'max:191|nullable',
            'resetcount' => 'max:191|nullable',
            'otpkey' => 'max:191|nullable',
            'otep' => 'max:191|nullable',
            'requirereset' => 'max:191|nullable',
            'lookingfor' => 'in:Male,Female|max:191|nullable',
            'ethnicity' => 'max:191|nullable',
            'country_id' => 'integer|exists:countries,id|max:4294967295|nullable',
            'state_id' => 'integer|exists:states,id|max:4294967295|nullable',
            'city_id' => 'integer|exists:cities,id|max:4294967295|nullable',
            'gender' => 'in:Male,Female,Other|max:191|nullable',
            'personality' => 'max:191|nullable',
            'aboutme' => 'max:65535|nullable',
            'dob' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'devicetype' => 'max:191|nullable',
            'devicetoken' => 'max:191|nullable',
            'facebookid' => 'max:191|nullable',
            'gmailid' => 'max:191|nullable',
            'ntcount' => 'max:191|nullable',
            'pictures' => 'nullable',
            'online' => 'nullable',
            'license' => 'nullable'
        ];
    }




    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
//    public function setDobAttribute($input)
//    {
//        if ($input) {
//            $this->attributes['dob'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
//        }
//    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
//    public function getDobAttribute($output)
//    {
//        if ($output) {
//            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
//        }
//    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function videos()
    {
        return $this->belongsTo(Uservideo::class, 'id');
    }




    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function isOnline()
    {
        return \Illuminate\Support\Facades\Cache::has('user-is-online-' . $this->id);
    }
}
