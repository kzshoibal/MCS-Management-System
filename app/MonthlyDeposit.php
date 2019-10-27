<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyDeposit extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'monthly_deposits';

//    protected $appends = [
//        'deposit_image',
//    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'deposit_image',
        'amount',
        'date',
        'transaction_type',
        'description',
        'is_approved',
        'bank_account_id',
        'project_id',
        'approved_by',
        'deposited_by',
    ];

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
