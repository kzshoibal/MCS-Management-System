<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Support\Facades\DB;

class BankAccount extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'bank_accounts';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'account_opening_date',
    ];

    protected $fillable = [
        'balance',
        'bank_name',
        'created_at',
        'updated_at',
        'deleted_at',
        'branch_name',
        'account_title',
        'account_number',
        'account_type_id',
        'account_opening_date',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'bank_account_id', 'id');
    }

    public function monthlyDeposits()
    {
        return $this->hasMany(MonthlyDeposit::class,'bank_account_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'bank_account_id', 'id');

    }

    public function account_type()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getAccountOpeningDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAccountOpeningDateAttribute($value)
    {
        $this->attributes['account_opening_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

//    public static function getBankAccountTitleFromId($id){
//        $accountTitle = DB::table('bank_accounts')->find('account_title')->where('id',$id)->get();
////        $accountTitle = DB::table('bank_accounts')->where('id',$id)->get()->first();
//        return $accountTitle;
//    }
}
