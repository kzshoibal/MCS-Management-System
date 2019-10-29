<?php

namespace App\Http\Controllers\Admin;

use App\AccountType;
use App\BankAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankAccountRequest;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankAccountsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccounts = BankAccount::all();

        return view('admin.bankAccounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id');

        return view('admin.bankAccounts.create', compact('account_types', 'users'));
    }

    public function store(StoreBankAccountRequest $request)
    {
        $bankAccount = BankAccount::create($request->all());
        $bankAccount->users()->sync($request->input('users', []));

        return redirect()->route('admin.bank-accounts.index');
    }

    public function edit(BankAccount $bankAccount)
    {
        abort_if(Gate::denies('bank_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_types = AccountType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id');

        $bankAccount->load('account_type', 'users');

        return view('admin.bankAccounts.edit', compact('account_types', 'users', 'bankAccount'));
    }

    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->update($request->all());
        $bankAccount->users()->sync($request->input('users', []));

        return redirect()->route('admin.bank-accounts.index');
    }

    public function show(BankAccount $bankAccount)
    {
//        dd($bankAccount->id);
        abort_if(Gate::denies('bank_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccount->load('account_type', 'users');
        dd($bankAccount->account_type());

        return view('admin.bankAccounts.show', compact('bankAccount'));
    }

    public function destroy(BankAccount $bankAccount)
    {
        abort_if(Gate::denies('bank_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccount->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankAccountRequest $request)
    {
        BankAccount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
