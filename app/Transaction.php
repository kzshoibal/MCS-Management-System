<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\BankAccount;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'transactions';

    protected $dates = [
//        'end_date',
//        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
//        'deposit_image',
//        'amount',
//        'date',
//        'transaction_type',
        'description',
//        'is_approved',
//        'project_id',
//        'approved_by',
//        'deposited_by',
        'bank_account_id',
    ];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }
}
