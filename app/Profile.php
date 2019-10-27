<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $table = 'profiles';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'education',
        'designation',
        'profile_image',
        'present_address',
        'permanent_address',
        'office_address',
        'current_location',
        'nid_number',
        'profile_summary',
        'notes',
        'phone_number',
        'updated_at',
        'created_at',
        'deleted_at',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
