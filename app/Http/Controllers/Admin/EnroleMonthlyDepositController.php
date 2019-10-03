<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnroleMonthlyDepositController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrole_monthly_deposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enroleMonthlyDeposits.index');
    }
}
