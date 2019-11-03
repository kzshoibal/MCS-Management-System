<?php

namespace App\Http\Controllers\Admin;

use App\BankAccount;
use App\MonthlyDeposit;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Gate;
use Image;
use Intervention\Image\File;
use Auth;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreMonthlyDepositRequest;
use App\Http\Requests\UpdateMonthlyDepositRequest;

class MonthlyDepositController extends Controller
{
    public function index()
    {
//        abort_if(Gate::denies('monthly_deposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //get the Auth user
        $user = Auth::user();

        // Find the users monthly deposit.
        $deposits = MonthlyDeposit::all()->where('deposited_by', $user->id);

        return view('admin.monthlyDeposits.index',compact('deposits'));
    }

    public function getAllMonthlyDepositList()
    {
        $deposits = MonthlyDeposit::all();
        $deposits->load('bank_account','depositedBy');

        return view('admin.monthlyDeposits.listall',compact('deposits'));
    }

    public function getAllPendingMonthlyDepsitList()
    {
        $deposits = MonthlyDeposit::all()->where('is_approved', 0 );
        $deposits->load('bank_account','depositedBy');
        return view('admin.monthlyDeposits.pendingRequest.index',compact('deposits'));

    }

    public function getAllApprovedMonthlyDepositList()
    {
        $deposits = MonthlyDeposit::all()->where('is_approved', 1);
        $deposits->load('bank_account','depositedBy');
//        dd($deposits->all());
        return view('admin.monthlyDeposits.approvedRequest.index',compact('deposits'));
    }
    public function getAllRejectedMonthlyDepositList()
    {
        $deposits = MonthlyDeposit::all()->where('is_approved', 2);
        $deposits->load('bank_account','depositedBy');
//        dd($deposits->all());
        return view('admin.monthlyDeposits.rejectedRequest.index',compact('deposits'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        abort_if(Gate::denies('monthly_deposit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        return redirect()->route('admin.monthly-deposits.index')->with("success","Your monthly deposit request is submitted successfully !");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show(MonthlyDeposit $depositDetail)
    public function show($id)
    {
//        abort_if(Gate::denies('monthly_deposit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        dd($deposit->id);
        $depositDetail = MonthlyDeposit::find($id);

        $depositDetail->load('bank_account','depositedBy');
//        dd($depositDetail->depositedBy->name);
        if($depositDetail->approved_by)
        {
            $approvedUser = User::find($depositDetail->approved_by);
//            dd($approvedUser);
            return view('admin.monthlyDeposits.show',compact('depositDetail','approvedUser'));
        }
        else
        {
            return view('admin.monthlyDeposits.show',compact('depositDetail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
//        abort_if(Gate::denies('monthly_deposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        dd($id);
        $deposits = MonthlyDeposit::find($id);
        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deposits->load('bank_account','depositedBy');
//        $user = Auth::user();

        return view('admin.monthlyDeposits.edit',compact('deposits','bank_accounts'));
    }

    public function editFromAllList($id)
    {
        //        abort_if(Gate::denies('monthly_deposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        dd($id);
        $deposits = MonthlyDeposit::find($id);
        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deposits->load('bank_account', 'depositedBy');
//        $user = Auth::user();

        return view('admin.monthlyDeposits.editFromAllList', compact('deposits', 'bank_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthlyDepositRequest $request, $id)
    {
//        dd($request->all());
        $deposits = MonthlyDeposit::find($id);

        //Prepare the update request
        $deposits->bank_account_id = $request->bank_account_id;
        $deposits->amount = $request->amount;
        $deposits->date = $request->date;
        $deposits->description = $request->description;
        if($request->hasFile('deposit_image')){
            $oldImagePath = asset($deposits->deposit_image);
            $fileName = basename($oldImagePath);         // $file is set to "index.php"
            $filePath = '/upload/monthlyDepositImage/'.$fileName;
            if(is_file(public_path('/upload/monthlyDepositImage/'.$fileName))){
                unlink(public_path('/upload/monthlyDepositImage/'.$fileName));
            }
            $image = $request->file('deposit_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(512,512)->save(public_path('/upload/monthlyDepositImage/'.$filename));
            $deposits->deposit_image = asset('/upload/monthlyDepositImage/'.$filename);
        }

        $deposits->save();

        return redirect()->route('admin.monthly-deposits.index')->with('success', 'Monthly deposit request is updated successfully !');
    }

    public function updateFromAllList(UpdateMonthlyDepositRequest $request, $id)
    {
        $deposits = MonthlyDeposit::find($id);

        //Prepare the update request
        $deposits->bank_account_id = $request->bank_account_id;
        $deposits->amount = $request->amount;
        $deposits->date = $request->date;
        $deposits->description = $request->description;
        if($request->hasFile('deposit_image')){
            $oldImagePath = asset($deposits->deposit_image);
            $fileName = basename($oldImagePath);         // $file is set to "index.php"
            $filePath = '/upload/monthlyDepositImage/'.$fileName;
            if(is_file(public_path('/upload/monthlyDepositImage/'.$fileName))){
                unlink(public_path('/upload/monthlyDepositImage/'.$fileName));
            }
            $image = $request->file('deposit_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(512,512)->save(public_path('/upload/monthlyDepositImage/'.$filename));
            $deposits->deposit_image = asset('/upload/monthlyDepositImage/'.$filename);
        }

        $deposits->save();

        return redirect()->route('admin.monthly-deposits.listall')->with('success', 'Monthly deposit request is updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyDeposit $monthlyDeposit)
    {
//        abort_if(Gate::denies('monthly_deposit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $monthlyDeposit->delete();
        return back()->with('success', 'Successfully deleted');
    }

    public function approveMonthlyDepositRequest($id)
    {
        $user = Auth::user();

        // Retrieve the monthly deposit entry
        $monthlyDeposit = MonthlyDeposit::find($id);

        //Retrieve the Bannk account from bank account id
        $bankAccount = BankAccount::find($monthlyDeposit->bank_account_id);

        //Update the is _approved status to 1
        $monthlyDeposit->is_approved = 1;
        $monthlyDeposit->approved_by = $user->id;
        //Update the bank balance
        $bankAccount->balance = $bankAccount->balance + $monthlyDeposit->amount;

        //save the Monthely Deposit table
        $monthlyDeposit->save();

        //save the bank table
        $bankAccount->save();

        //Route into the Pending Request Page
        return redirect()->route('admin.monthly-deposits.listpending')->with('success', 'Monthly deposit request is Approved successfully !');
    }

    public function rejectMonthlyDepositRequest($id)
    {
//        dd($id);
        // Retrive the monthly deposit entry
        $monthlyDeposit = MonthlyDeposit::find($id);
        $monthlyDeposit->is_approved = 2;
        $monthlyDeposit->save();
        return redirect()->route('admin.monthly-deposits.listpending')->with('success', 'Monthly deposit request is Rejected successfully !');

    }
}
