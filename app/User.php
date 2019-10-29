<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, HasApiTokens, HasMediaTrait, Auditable;

    public $table = 'users';

    protected $appends = [
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const GENDER_RADIO = [
        '1' => 'Male',
        '2' => 'Female',
    ];

    const STATUS = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    protected $attributes = [
        'status' => true,
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function bankAccounts()
    {
        return $this->belongsToMany(BankAccount::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    public function monthlyDeposits()
    {
        return $this->hasMany(MonthlyDeposit::class,'deposited_by','id');
    }
//    public function monthlyDeposit()
//    {
////        return $this->belongsTo(MonthlyDeposit::class,'deposited_by','id');
//        return $this->hasOne(MonthlyDeposit::class,'deposited_by','id');
//    }
//    public function depositor()
//    {
//        return $this->hasOne('App\MonthlyDeposit','deposited_by','id');
//    }


//    public function user_status()
//    {
//        return $this->belongsTo(UserStatus::class, 'user_status_id');
//    }
}
