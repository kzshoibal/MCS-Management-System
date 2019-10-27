<?php

namespace App\Http\Controllers\Admin;

use App\BankAccount;
use App\Http\Controllers\Controller;
use App\Project;
use Gate;
use Image;
use Intervention\Image\File;
use Auth;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\MonthlyDeposit;
use App\Http\Requests\StoreMonthlyDepositRequest;

class MonthlyDepositController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrole_monthly_deposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //get the Auth user
        $user = Auth::user();
        // Find the users monthly deposit.
        $deposits = DB::table('monthly_deposits')->where('deposited_by', $user->id)->get();

        return view('admin.monthlyDeposits.index',compact('deposits'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $users = User::all()->pluck('name', 'id');

//        $statuses = ProjectStatus::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $user = Auth::user();

        return view('admin.monthlyDeposits.create',compact('bank_accounts','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthlyDepositRequest $request)
    {
//        dd($request->all());

        if($request->hasFile('deposit_image'))
        {
            $image = $request->file('deposit_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(512,512)->save(public_path('/upload/monthlyDepositImage/'.$filename));
//            $imageData = asset('/upload/monthlyDepositImage/'.$filename);
            $imageData = '/upload/monthlyDepositImage/'.$filename;
        }

        $monthlyDeposit = MonthlyDeposit::create([
            'deposit_image' => $imageData,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'deposited_by' => $request->deposited_by,
            'bank_account_id' => $request->bank_account_id,
        ]);
//        dd($monthlyDeposit->description);

        return redirect()->route('admin.monthly-deposits.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $depositDetail = MonthlyDeposit::find($id);
        return view('admin.monthlyDeposits.show',compact('depositDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
