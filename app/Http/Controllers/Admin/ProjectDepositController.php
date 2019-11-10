<?php

namespace App\Http\Controllers\Admin;

use App\BankAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMonthlyDepositRequest;
use App\MonthlyDeposit;
use Illuminate\Http\Request;

class ProjectDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projectContributions.index');
    }

    public function getAllProjectDepositList()
    {
//        $deposits = MonthlyDeposit::all();
//        $deposits->load('bank_account','depositedBy');

        return view('admin.projectContributions.listall');
    }
    public function getAllPendingProjectDepsitList()
    {
//        $deposits = MonthlyDeposit::all()->where('is_approved', 0 );
//        $deposits->load('bank_account','depositedBy');
//        return view('admin.monthlyDeposits.pendingRequest.index',compact('deposits'));

    }
    public function getAllApprovedProjectDepositList()
    {
//        $deposits = MonthlyDeposit::all()->where('is_approved', 1);
//        $deposits->load('bank_account','depositedBy');
////        dd($deposits->all());
//        return view('admin.monthlyDeposits.approvedRequest.index',compact('deposits'));
    }
    public function getAllRejectedProjectDepositList()
    {
//        $deposits = MonthlyDeposit::all()->where('is_approved', 2);
//        $deposits->load('bank_account','depositedBy');
////        dd($deposits->all());
//        return view('admin.monthlyDeposits.rejectedRequest.index',compact('deposits'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function editFromAllList($id)
    {
//        //        abort_if(Gate::denies('monthly_deposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
////        dd($id);
//        $deposits = MonthlyDeposit::find($id);
//        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//        $deposits->load('bank_account', 'depositedBy');
////        $user = Auth::user();
//
//        return view('admin.monthlyDeposits.editFromAllList', compact('deposits', 'bank_accounts'));
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

    public function updateFromAllList(UpdateMonthlyDepositRequest $request, $id)
    {
//        $deposits = MonthlyDeposit::find($id);
//
//        //Prepare the update request
//        $deposits->bank_account_id = $request->bank_account_id;
//        $deposits->amount = $request->amount;
//        $deposits->date = $request->date;
//        $deposits->description = $request->description;
//        if($request->hasFile('deposit_image')){
//            $oldImagePath = asset($deposits->deposit_image);
//            $fileName = basename($oldImagePath);         // $file is set to "index.php"
//            $filePath = '/upload/monthlyDepositImage/'.$fileName;
//            if(is_file(public_path('/upload/monthlyDepositImage/'.$fileName))){
//                unlink(public_path('/upload/monthlyDepositImage/'.$fileName));
//            }
//            $image = $request->file('deposit_image');
//            $filename = time(). '.' . $image->getClientOriginalExtension();
//            Image::make($image)->resize(512,512)->save(public_path('/upload/monthlyDepositImage/'.$filename));
//            $deposits->deposit_image = asset('/upload/monthlyDepositImage/'.$filename);
//        }
//
//        $deposits->save();
//
//        return redirect()->route('admin.monthly-deposits.listall')->with('success', 'Monthly deposit request is updated successfully !');
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

    public function approveProjectDepositRequest($id)
    {
//        $user = Auth::user();
//
//        // Retrieve the monthly deposit entry
//        $monthlyDeposit = MonthlyDeposit::find($id);
//
//        //Retrieve the Bannk account from bank account id
//        $bankAccount = BankAccount::find($monthlyDeposit->bank_account_id);
//
//        //Update the is _approved status to 1
//        $monthlyDeposit->is_approved = 1;
//        $monthlyDeposit->approved_by = $user->id;
//        //Update the bank balance
//        $bankAccount->balance = $bankAccount->balance + $monthlyDeposit->amount;
//
//        //save the Monthely Deposit table
//        $monthlyDeposit->save();
//
//        //save the bank table
//        $bankAccount->save();
//
//        //Route into the Pending Request Page
//        return redirect()->route('admin.monthly-deposits.listpending')->with('success', 'Monthly deposit request is Approved successfully !');
    }

    public function rejectProjectDepositRequest($id)
    {
////        dd($id);
//        // Retrive the monthly deposit entry
//        $monthlyDeposit = MonthlyDeposit::find($id);
//        $monthlyDeposit->is_approved = 2;
//        $monthlyDeposit->save();
//        return redirect()->route('admin.monthly-deposits.listpending')->with('success', 'Monthly deposit request is Rejected successfully !');

    }
}
